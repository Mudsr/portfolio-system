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
    public $merges;
    public $splits;
    public $transfers;

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
        $this->merges = collect();
        $this->splits = collect();
        $this->transfers = collect();
    }

    public function render()
    {
        return view('livewire.report.index')->extends('layouts.main');
    }


    public function updating()
    {
        $this->deals = collect();
        $this->portfolio = null;
        $this->show = false;
        $this->merges = collect();
        $this->splits = collect();
        $this->transfers = collect();
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
                $this->plotMergeReport();
                break;
            case 'split':
                $this->plotSplitReport();
                break;
            case 'transfer':
                $this->plotTransferReport();
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
        $this->deals = $this->portfolio->deals()->closed()
            ->whereBetween('closed_at', [$this->from_date, $this->to_date])
            ->with('plot', 'client')
            ->get();
            $this->show = true;
    }

    private function plotMergeReport()
    {
        $this->merges = $this->portfolio->merges()
            ->whereBetween('entry_date', [$this->from_date, $this->to_date])
            ->with('mergedDeal')
            ->get();
            $this->show = true;

    }

    private function plotSplitReport()
    {
        $this->splits = $this->portfolio->splits()
            ->whereBetween('entry_date', [$this->from_date, $this->to_date])
            ->with('oldPlot')
            ->get();

        $this->show = true;
    }

    private function plotTransferReport()
    {
        $this->transfers = $this->portfolio->transfers()
            ->whereBetween('entry_date', [$this->from_date, $this->to_date])
            ->with('oldClient', 'newClient')
            ->get();
        $this->show = true;
    }

}
