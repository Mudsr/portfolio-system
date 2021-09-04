<?php

namespace App\Http\Livewire\Merge;

use App\Models\Deal;
use App\Models\User;
use Livewire\Component;
use App\Models\Portfolio;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Create extends Component
{
    use WithPagination, WithFileUploads;

    public $portfolio_id;
    public $deal1;
    public $deal2;

    public $plot1;
    public $plot2;

    public $deals;
    public $portfolios;
    public $dealsFiltered;
    public $portfolio=null;


    public function mount()
    {
        $this->portfolios = Portfolio::active()->get();
        $this->deals = collect();
        $this->dealsFiltered = collect();
    }

    public function render()
    {
        return view('livewire.merge.create')->extends('layouts.main');
    }


    public function updatedPortfolioId($id)
    {
        $this->portfolio = Portfolio::find($id);
        if( isset($this->portfolio) && $this->portfolio->deals->count() > 0) {
            $this->deals = $this->portfolio->deals()->active()->with('plot', 'client')->get();
        }
    }

    public function updatedDeal1($id)
    {
        $deal = Deal::find($id);
        if($deal) {
            $this->plot1 = $deal->plot;
            $this->dealsFiltered = $this->portfolio->deals()->active()->where('id', '!=', $id)->get();
        }
    }

    public function updatedDeal2($id)
    {
        $deal = Deal::find($id);
        if($deal) {
            $this->plot2 = $deal->plot;
        }
    }

}
