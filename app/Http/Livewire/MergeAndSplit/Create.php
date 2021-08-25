<?php

namespace App\Http\Livewire\MergeAndSplit;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.merge-and-split.create'[
            'merges' => Merge::paginate(10),
        ]
        )->extends('layouts.main');
    }
}
