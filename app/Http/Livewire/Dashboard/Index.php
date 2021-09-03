<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Index extends Component
{
    public $tasks;


    public function mount()
    {
        $this->tasks = collect();
    }

    public function render()
    {
        return view('livewire.dashboard.index')->extends('layouts.main');
    }
}
