<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        return view('livewire.task.index',['tasks' =>  Task::paginate(10)])->extends('layouts.main');
    }
}
