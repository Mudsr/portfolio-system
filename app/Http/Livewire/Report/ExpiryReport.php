<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use App\Models\Portfolio;
use App\Exports\PlotReport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExpiryReport extends Component
{

    public $portfolios;

    public $portfolio_id;
    public $from_date;
    public $to_date;

    public $deals;
    public $show = false;
    public $transfers;
    public $pdfView;
    public $type;

    protected $rules = [
        'portfolio_id' => 'required|integer',
        'from_date' => 'required',
        'to_date' => 'required',
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
        return view('livewire.report.expiry-report')->extends('layouts.main');
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
        $this->plotExpiryReport();
    }

    private function plotExpiryReport()
    {
        if( isset($this->type) ) {
            $this->deals = $this->portfolio->deals()->whereHas('plot', fn ($query) =>
                $query->whereHas('media', fn($q) =>
                    $q->where('custom_properties->type', $this->type)
                        ->whereBetween('custom_properties->expiry_date', [$this->from_date, $this->to_date])
                )
            )->with('plot', 'client')->get();


            $this->show = true;

            return;
        }

        $this->deals = $this->portfolio->deals()->whereHas('plot', fn ($query) =>
            $query->whereHas('media', fn ($q) =>
                $q->where('custom_properties->expiry_date', '<', now())
            )
        )->with('plot', 'client')->get();

        $this->show = true;

        return;
    }

    public function exportPdf()
    {
        $view = 'livewire.report.partials.expiry';
        // return (new PlotReport($this->deals, $view))->download('report.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        return Excel::download(new PlotReport($this->deals, $view), 'expiry-report.pdf');

    }

    public function exportExcel()
    {
        $view = 'livewire.report.partials.expiry';

        return Excel::download(new PlotReport($this->deals, $view), 'expiry-report.xlsx');
    }
}
