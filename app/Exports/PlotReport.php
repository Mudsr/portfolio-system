<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class PlotReport implements FromView
{
    use Exportable;

    public function __construct($deals, $view, $type)
    {
        $this->deals = $deals;
        $this->view = $view;
        $this->type = $type;
    }


    public function view(): View
    {
        switch ($this->type) {
            case 'merge':
                return view($this->view, [
                    'merges' => $this->deals
                ]);
                break;
            case 'split':
                return view($this->view, [
                    'splits' => $this->deals
                ]);
                break;
            case 'transfer':
                return view($this->view, [
                    'transfers' => $this->deals
                ]);
                break;

            default:
                return view($this->view, [
                    'deals' => $this->deals
                ]);
                break;
        }

    }
}
