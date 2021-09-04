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
        $this->pendingTasks = collect();
        $this->upcomingRenewals = collect();
        $this->alerts = collect();
    }

    public function render()
    {
        return view('livewire.dashboard.index')->extends('layouts.main');
    }

    public function pendingTasks()
    {
        // return Task::
    }

}
