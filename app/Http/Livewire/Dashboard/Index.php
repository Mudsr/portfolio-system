<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Task;
use Livewire\Component;
use App\Models\Portfolio;

class Index extends Component
{
    public $pendingTasks;
    public $upcomingRenewals;
    public $alerts;
    public $currentPortfolio;
    public $portfolios;


    public function mount()
    {
        $this->portfolios = Portfolio::active()->get();
        $this->currentPortfolio = Portfolio::getCurrentPortfolio();
        $this->pendingTasks = $this->getPendingTasks();
        $this->upcomingRenewals = collect();
    }

    public function render()
    {
        return view('livewire.dashboard.index')->extends('layouts.main');
    }

    public function getPendingTasks()
    {
        $pendingTasks = $this->currentPortfolio->tasks()->where('completed_at', null)
            ->orWhere(function($query){
                $query->where('due_date', '<' , now())
                    ->where('completed_at', null);
            })
            ->with('client', 'portfolio')
            ->get();

        return $pendingTasks;
    }

    // public function getUpcomingRenewals()
    // {
    //     $upcomingRenewals = $this->portfolio->deals()->where()
    // }

}
