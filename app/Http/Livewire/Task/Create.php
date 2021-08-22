<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;
use App\Models\Portfolio;

class Create extends Component
{
    public $description;
    public $portfolio_id;
    public $client_id;
    public $plots;
    public $plot_id;
    public $portfolios;
    public $clients;
    public $due_date;
    public $document_type;

    protected $rules = [
        'portfolio_id' => 'required|integer',
        'client_id' => 'required|integer',
        'plot_id' => 'required|integer',
        'description' => 'required|string',
        'due_date' => 'required|date',
        'document_type' => 'required|string',
    ];

    public function mount()
    {
        $this->portfolios = Portfolio::all();
        $this->clients = User::clients()->get();
        $this->plots = collect();
    }


    public function render()
    {
        return view('livewire.task.create')->extends('layouts.main');
    }

    public function updatedClientId($id)
    {
        if (!is_null($id)) {
            $user =  User::with('deals', 'deals.plot')->find($this->client_id);
            if($user) {
                $this->plots = $user->deals->pluck('plot');
            }

        }
    }

    public function submit()
    {
        $this->validate();
        
        $task = Task::create([
            'portfolio_id' => $this->portfolio_id,
            'client_id' => $this->client_id,
            'plot_id' => $this->plot_id,
            'description' => $this->description,
            'due_date' => $this->due_date,
            'document_type' => $this->document_type,
        ]);

        return redirect()->route('tasks.index');
    }

}
