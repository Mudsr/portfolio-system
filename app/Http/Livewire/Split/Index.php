<?php

namespace App\Http\Livewire\Split;

use App\Models\Split;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.split.index', ['splits' => Split::paginate(10)])->extends('layouts.main');
    }
}
