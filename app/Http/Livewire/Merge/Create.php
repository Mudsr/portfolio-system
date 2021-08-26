<?php

namespace App\Http\Livewire\Merge;

use App\Models\Deal;
use App\Models\User;
use Livewire\Component;
use App\Models\Portfolio;

class Create extends Component
{
    public $portfolio_id;
    public $deal1;
    public $deal2;
    public $plot1;
    public $plot2;

    public $deals;
    public $portfolios;
    public $dealsFiltered;
    public $portfolio=null;

    protected $rules = [
        'portfolio_id' => 'required|integer',
        'deal1' => 'required|integer',
        'deal2' => 'required|integer',
    ];

    public function mount()
    {
        $this->portfolios = Portfolio::all();
        $this->deals = collect();
        $this->dealsFiltered = collect();
    }

    public function render()
    {
        return view('livewire.merge.create')->extends('layouts.main');
    }

    public function updatedPortfolioId($id)
    {
        $this->portfolio = Portfolio::findOrFail($id);
        if( $this->portfolio->deals->count() > 0) {
            $this->deals = $this->portfolio->deals;
        }
    }

    public function updatedDeal1($id)
    {
        $deal = Deal::findOrFail($id);
        $this->plot1 = $deal->plot;
        $this->dealsFiltered = $this->portfolio->deals()->where('id', '!=', $id)->get();
    }

    public function updatedDeal2($id)
    {
        $deal = Deal::findOrFail($id);
        $this->plot2 = $deal->plot;
    }
}
