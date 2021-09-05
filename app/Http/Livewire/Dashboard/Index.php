<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Task;
use Livewire\Component;

class Index extends Component
{
    public $pendingTasks;
    public $upcomingRenewals;
    public $alerts;


    public function mount()
    {
        $this->pendingTasks = $this->getPendingTasks();
        $this->upcomingRenewals = collect();
        $this->alerts = collect();
    }

    public function render()
    {
        return view('livewire.dashboard.index')->extends('layouts.main');
    }

    public function getPendingTasks()
    {
        $pendingTasks = Task::where('completed_at', null)
            ->orWhere(function($query){
                $query->where('due_date', '<' , now())
                    ->where('completed_at', null);
            })
            ->with('client', 'portfolio')
            ->get();

        return $pendingTasks;
    }

}
