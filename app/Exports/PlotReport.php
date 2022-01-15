<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class PlotReport implements FromView
{
    public function __construct($deals, $view)
    {
        $this->deals = $deals;
        $this->view = $view;
     
    }


    public function view(): View
    {
        return view($this->view, [
            'deals' => $this->deals
            
        ]);
    }
}
