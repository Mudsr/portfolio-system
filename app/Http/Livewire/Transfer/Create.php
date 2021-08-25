<?php

namespace App\Http\Livewire\Transfer;

use App\Models\Plot;
use App\Models\User;
use Livewire\Component;
use App\Models\Portfolio;

class Create extends Component
{

    public $portfolio_id;
    public $old_client_id;
    public $new_client_id;
    public $plot_id;

    public $plots;
    public $portfolios;
    public $clients;

    protected $rules = [
        'portfolio_id' => 'required|integer',
        'old_client_id' => 'required|integer',
        'new_client_id' => 'required|integer',
        'plot_id' => 'required|integer',
    ];

    public function mount()
    {
        $this->portfolios = Portfolio::all();
        $this->clients = User::clients()->get();
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
            $this->plots = $portfolio->deals->pluck('plot');
        }
    }

    public function updatedPlotId($id)
    {
        $plot = Plot::findOrFail($id);
        $this->old_client_id = $plot->deal->client_id;
    }

    public function submit()
    {
        $this->validate();

        // $task = Task::create([
        //     'portfolio_id' => $this->portfolio_id,
        //     'client_id' => $this->client_id,
        //     'plot_id' => $this->plot_id,
        //     'description' => $this->description,
        //     'due_date' => $this->due_date,
        //     'document_type' => $this->document_type,
        // ]);

        return redirect()->route('tasks.index');
    }
}
