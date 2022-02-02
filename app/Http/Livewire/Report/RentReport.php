<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use App\Models\Portfolio;
use App\Exports\PlotReport;
use App\Models\Client;
use App\Models\Plot;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;

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

    public $status;

    public $client_id;
    public $plots;
    public $plot_id;
    public $clients;

    protected $rules = [
        'portfolio_id' => 'required|integer',
        'status' => 'required'
        // 'from_date' => 'required_with:to_date',
        // 'to_date' => 'required_with:from_date',
    ];

    public function mount()
    {
        $this->portfolios = Portfolio::active()->get();
        $this->deals = collect();
        $this->merges = collect();
        $this->splits = collect();
        $this->transfers = collect();

        $this->clients = Client::get();
        $this->plots = collect();
    
    }

    public function render()
    {
        $status = $this->status;
        return view('livewire.report.rent-report',['status'=>$status])->extends('layouts.main');
    }

    public function updating()
    {
        $this->deals = collect();
        $this->portfolio = null;
        $this->show = false;
    }


    public function updatedClientId($id)
    {
        if (!is_null($id)) {
            $user =  Client::with('deals', 'deals.plot')->find($this->client_id);
            if($user) {
                $this->plots = $user->deals->pluck('plot');
            }

        }
    }

    public function generateReport()
    {
        $this->validate();
        $this->portfolio = Portfolio::find($this->portfolio_id);
      if( $this->status == "paid")
      {
        $this->paidrentreport();
      } 
      elseif($this->status == "expiry")
      {

          $this->expiryRentReport();
      } 

      elseif($this->status == "client")
      {

          $this->clientRentReport();
      } 
      else
      {
      
        $this->rentReport();
      }
        
    }

    private function rentReport()
    {
       

       $this->deals = $this->portfolio->deals()->whereDoesntHave('paiRentPayments')->get();

        //  $this->deals = $this->portfolio->deals()->whereHave('paiRentPayments',
        //     fn($query) =>
        //         $query->where('to_date' , '>', $this->to_date)
        // )->with('paiRentPayments')->get();


        // $this->deals = $this->portfolio->deals()->whereHas('paiRentPayments',
        //     fn($query) =>
        //         $query->where('to_date' , '<', $this->to_date)
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

    private function paidrentreport(){

        $this->deals = $this->portfolio->deals()->whereHas('paiRentPayments',
            fn($query) =>
                $query->where('to_date' , '<=', $this->to_date)
        )->with('paiRentPayments')->get();

        $this->show = true;

        return;
    }

    public function expiryRentReport(){

        $this->deals = $this->portfolio->deals()->whereHas('paiRentPayments',
        fn($query) =>
            $query->whereBetween('to_date' , [$this->from_date, $this->to_date])
    )->with('paiRentPayments')->get();

    $this->show = true;

    return;
    }


    public function clientRentReport(){

        $this->deals = $this->portfolio->deals()->whereHas('paiRentPayments',
        fn($query) =>
            $query->whereBetween('to_date' , [$this->from_date, $this->to_date])->where('client_id',$this->client_id)->where('deal_id',$this->plot_id)
    )->with('paiRentPayments')->get();

    $this->show = true;

    return;
    }

    public function exportPdf()
    {
        $view = 'livewire.report.partials.rent';
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML($view);
        // return $pdf->stream('invoice.pdf',array('Attachment'=>0));
        // return (new PlotReport($this->deals, $view))->download('report.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
      return Excel::download(new PlotReport($this->deals, $view), 'rent-report.pdf');
    // $data = new PlotReport($this->deals, $view);
    
    //   $pdf = PDF::loadHTML($view);
    //   return  PDF::loadView(new PlotReport($this->deals, $view), 'rent-report.pdf');


    }

    public function exportExcel()
    {
        $view = 'livewire.report.partials.rent';
        

        return Excel::download(new PlotReport($this->deals, $view), 'rent-report.xlsx');
    }
}
