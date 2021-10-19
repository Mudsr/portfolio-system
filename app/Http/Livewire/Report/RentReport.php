<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use App\Models\Portfolio;
use App\Exports\PlotReport;
use Maatwebsite\Excel\Facades\Excel;

class RentReport extends Component
{
    public $portfolios;

    public $portfolio_id;
    public $from_date;
    public $to_date;
    public $type;

    public $deals;
    public $show = false;
    public $merges;
    public $splits;
    public $transfers;
    public $pdfView;

    protected $rules = [
        'portfolio_id' => 'required|integer',
        'from_date' => 'required_with:to_date',
        'to_date' => 'required_with:from_date',
    ];

    public function mount()
    {
        $this->portfolios = Portfolio::active()->get();
        $this->deals = collect();
        $this->merges = collect();
        $this->splits = collect();
        $this->transfers = collect();
    }

    public function render()
    {
        return view('livewire.report.rent-report')->extends('layouts.main');
    }

    public function updating()
    {
        $this->deals = collect();
        $this->portfolio = null;
        $this->show = false;
    }

    public function generateReport()
    {
        $this->validate();
        $this->portfolio = Portfolio::find($this->portfolio_id);
        $this->rentReport();
    }

    private function rentReport()
    {
        $this->deals = $this->portfolio->deals()->whereDoesntHave('paiRentPayments')->get();

        // $this->deals = $this->portfolio->deals()->whereHave('paiRentPayments',
        //     fn($query) =>
        //         $query->where('to_date' , '<', Carbon::now())
        // )->with('paiRentPayments')->get();
        // if( $this->type == 'by_date_range' ) {
        //     $this->deals = $this->portfolio->deals()->whereHas('plot', fn ($query) =>
        //         $query->whereHas('media', fn($q) =>
        //             $q->whereBetween('custom_properties->expiry_date', [$this->from_date, $this->to_date])
        //         )
        //     )->with('plot', 'client')->get();

        //     $this->show = true;

        //     return;
        // }

        // $this->deals = $this->portfolio->deals()->whereHas('plot', fn ($query) =>
        //     $query->whereHas('media', fn ($q) =>
        //         $q->where('custom_properties->expiry_date', '<', now())
        //     )
        // )->with('plot', 'client')->get();

        $this->show = true;

        return;
    }

    public function exportPdf()
    {
        $view = 'livewire.report.partials.expiry';
        // return (new PlotReport($this->deals, $view))->download('report.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        return Excel::download(new PlotReport($this->deals, $view), 'rent-report.pdf');

    }

    public function exportExcel()
    {
        $view = 'livewire.report.partials.expiry';

        return Excel::download(new PlotReport($this->deals, $view), 'rent-report.xlsx');
    }
}
