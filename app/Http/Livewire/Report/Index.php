<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use App\Models\Portfolio;

class Index extends Component
{
    public $portfolios;

    public $portfolio_id;
    public $from_date;
    public $to_date;
    public $type;

    public $deals;
    public $show = false;

    protected $rules = [
        'portfolio_id' => 'required|integer',
        'from_date' => 'required|date',
        'to_date' => 'required|date|after:from_date',
        'type' => 'required|string',
    ];

    public function mount()
    {
        $this->portfolios = Portfolio::active()->get();
        $this->deals = collect();
    }

    public function render()
    {
        return view('livewire.report.index')->extends('layouts.main');
    }


    public function updating()
    {
        $this->deals = collect();
        $this->portfolio = null;
    }

    public function generateReport()
    {
        $this->validate();

        $this->portfolio = Portfolio::find($this->portfolio_id);

        switch ($this->type) {
            case 'plot_closure':
                $this->plotClosureReport();
                break;
            case 'merge':
                # code...
                break;
            case 'split':
                # code...
                break;
            case 'transfer':
                # code...
                break;

            default:
               $this->plotAdditionReport();
                break;
        }

    }

    private function plotAdditionReport()
    {
        $this->deals = $this->portfolio->deals()->whereBetween('entry_date', [$this->from_date, $this->to_date])
            ->with('plot', 'client')
            ->get();
        $this->show = true;
    }

    private function plotClosureReport()
    {
        $this->deals = $this->portfolio->deals()->whereBetween('entry_date', [$this->from_date, $this->to_date])
            ->with('plot', 'client')
            ->get();
        $this->show = true;
    }
}
