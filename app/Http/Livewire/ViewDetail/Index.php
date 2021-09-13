<?php

namespace App\Http\Livewire\ViewDetail;

use App\Models\Client;
use App\Models\Deal;
use App\Models\Portfolio;
use Livewire\Component;

class Index extends Component
{

    public $filter_by;
    public $portfolio_id;
    public $client_id;
    public $from_date;
    public $to_date;

    public $deals;
    public $portfolios;
    public $clients;

    protected $rules = [
        'from_date' => 'required|date',
        'to_date' => 'required|date|after:from_date',
    ];

    public function mount()
    {
        $this->filter_by = 'portfolio';
        $this->portfolios = Portfolio::active()->get();
        $this->deals = $this->portfolios->first()->deals;
    }

    public function render()
    {
        return view('livewire.view-detail.index')->extends('layouts.main');
    }

    public function updating()
    {
        $this->deals = collect();
    }

    public function updatedFilterBy()
    {
        if($this->filter_by == 'client') {
            $this->clients = Client::all();
        }
        if($this->filter_by == 'portfolio') {
            $this->deals = $this->portfolios->first()->deals;
        }
    }

    public function updatedPortfolioId($id)
    {
        $portfolio = Portfolio::find($id);
        $this->deals = $portfolio->deals;
    }

    public function updatedClientId($id)
    {
        $client = Client::find($id);
        $this->deals = $client->deals;
    }

    public function updatedFromDate()
    {
        $this->validate();
    }

    public function updatedToDate()
    {
        $this->validate();
        if($this->filter_by == 'by_date') {
            $this->deals = Deal::whereBetween('entry_date', [$this->from_date, $this->to_date])
                ->with('plot', 'client')
                ->get();
        }

        if ($this->filter_by == 'documents') {
            $this->deals = Deal::whereBetween('entry_date', [$this->from_date, $this->to_date])
            ->with('plot', 'client')
            ->get();
        }
    }
}
