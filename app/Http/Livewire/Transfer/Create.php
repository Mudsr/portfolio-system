<?php

namespace App\Http\Livewire\Transfer;

use App\Models\Deal;
use App\Models\Plot;
use App\Models\User;
use App\Models\Client;
use Livewire\Component;
use App\Models\Transfer;
use App\Models\Portfolio;

class Create extends Component
{

    public $portfolio_id;
    public $old_client_id;
    public $new_client_id;
    public $plot_id;
    public $entry_date;

    public $plots;
    public $portfolios;
    public $clients;
    public $newClients;

    protected $rules = [
        'portfolio_id' => 'required|integer',
        'old_client_id' => 'required|integer',
        'new_client_id' => 'required|integer',
        'plot_id' => 'required|integer',
        'entry_date' => 'required|date',
    ];

    public function mount()
    {
        $this->portfolios = Portfolio::active()->get();
        $this->clients = Client::get();
        $this->newClients = Client::where('id', '!=', $this->old_client_id)->get();
        $this->plots = collect();
    }

    public function render()
    {
        return view('livewire.transfer.create')->extends('layouts.main');;
    }

    public function updatedPortfolioId($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        if( $portfolio->deals->count() > 0) {
            $this->plots = $portfolio->deals()->with('plot', 'client')->get();
        }
    }

    public function updatedPlotId($id)
    {
        $deal = Deal::find($id);
        if($deal) {
            $this->old_client_id = $deal->client_id;
            $this->newClients = Client::where('id', '!=', $this->old_client_id)->get();
        }
    }

    public function submit()
    {
        $this->validate();

        $transfer = Transfer::create([
            'portfolio_id' => $this->portfolio_id,
            'old_client_id' => $this->old_client_id,
            'new_client_id' => $this->new_client_id,
            'plot_id' => $this->plot_id,
            'entry_date' => $this->entry_date,
        ]);

        $plot = Plot::find($this->plot_id);
        $deal = $plot->deal;
        $deal->client_id = $this->new_client_id;
        $deal->type = 'transfer';
        $deal->save();

        return redirect()->route('transfers.index');
    }
}
