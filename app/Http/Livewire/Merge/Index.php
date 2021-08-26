<?php

namespace App\Http\Livewire\Merge;

use App\Models\Merge;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.merge.index', ['merges' => Merge::paginate(10)])->extends('layouts.main');
    }
}
