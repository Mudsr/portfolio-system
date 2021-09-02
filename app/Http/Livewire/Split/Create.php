<?php

namespace App\Http\Livewire\Split;

use App\Models\Deal;
use Livewire\Component;
use App\Models\Portfolio;

class Create extends Component
{

    public $portfolio_id;
    public $deal_id;
    public $plotDetail;

    public $deals;
    public $portfolios;
    public $dealsFiltered;
    public $portfolio=null;

    public function mount()
    {
        $this->portfolios = Portfolio::all();
        $this->deals = collect();
        $this->dealsFiltered = collect();
    }

    public function render()
    {
        return view('livewire.split.create')->extends('layouts.main');
    }

    public function updatedPortfolioId($id)
    {
        $this->portfolio = Portfolio::findOrFail($id);
        if( $this->portfolio->deals->count() > 0) {
            $this->deals = $this->portfolio->deals;
        }
    }

    public function updatedDealId($id)
    {
        $deal = Deal::findOrFail($id);
        $this->plotDetail = $deal->plot;
    }

}
