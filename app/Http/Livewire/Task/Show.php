<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class Show extends Component
{

    public $task;

    public function mount(Task $task)
    {
        $this->task = $task;
    }

    public function render()
    {
        return view('livewire.task.show')->extends('layouts.main');
    }
}
