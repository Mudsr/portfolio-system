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
        $type = $this->type;
        return view('livewire.report.expiry-report',['type'=>$type])->extends('layouts.main');
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
        // if( isset($this->type) ) {
        //     $this->deals = $this->portfolio->deals()->whereHas('plot', fn ($query) =>
        //         $query->whereHas('media', fn($q) =>
        //             $q->where('custom_properties->type', $this->type)
        //                 ->whereBetween('custom_properties->expiry_date', [$this->from_date, $this->to_date])
        //         )
        //     )->with('plot', 'client')->get();


        //     $this->show = true;

        //     return;
        // } 
        
        if($this->type == "all") {


            $this->deals = $this->portfolio->deals()->whereHas('plot', fn ($query) =>
            $query->whereHas('media', fn ($q) =>
                $q->whereBetween('custom_properties->expiry_date', [$this->from_date, $this->to_date])
            )
        )->with('plot', 'client')->get();

        $this->show = true;

        return;
        }

        else {


            
                $this->deals = $this->portfolio->deals()->whereHas('plot', fn ($query) =>
                    $query->whereHas('media', fn($q) =>
                        $q->where('custom_properties->type', $this->type)
                            ->whereBetween('custom_properties->expiry_date', [$this->from_date, $this->to_date])
                    )
                )->with('plot', 'client')->get();
    
    
                $this->show = true;
    
                return;
           
        }
     

       
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

    public function paiexportPdf()
    {
        $view = 'livewire.report.partials.paiexpiry';
        // return (new PlotReport($this->deals, $view))->download('report.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        return Excel::download(new PlotReport($this->deals, $view), 'expiry-report.pdf');

    }

    public function paiexportExcel()
    {
        $view = 'livewire.report.partials.paiexpiry';

        return Excel::download(new PlotReport($this->deals, $view), 'expiry-report.xlsx');
    }

    public function fiexportPdf()
    {
        $view = 'livewire.report.partials.fiexpiry';
        // return (new PlotReport($this->deals, $view))->download('report.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        return Excel::download(new PlotReport($this->deals, $view), 'expiry-report.pdf');

    }

    public function fiexportExcel()
    {
        $view = 'livewire.report.partials.fiexpiry';

        return Excel::download(new PlotReport($this->deals, $view), 'expiry-report.xlsx');
    }

    public function poaexportPdf()
    {
        $view = 'livewire.report.partials.poaexpiry';
        // return (new PlotReport($this->deals, $view))->download('report.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        return Excel::download(new PlotReport($this->deals, $view), 'expiry-report.pdf');

    }

    public function poaexportExcel()
    {
        $view = 'livewire.report.partials.poaexpiry';

        return Excel::download(new PlotReport($this->deals, $view), 'expiry-report.xlsx');
    }
}
