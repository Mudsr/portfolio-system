<?php

namespace App\Http\Livewire\MergeAndSplit;

use App\Models\MergeAndSplit;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.merge-and-split.index',
            [
                'merges' => MergeAndSplit::merge()->paginate(10),
                'splits' => MergeAndSplit::split()->paginate(10),
            ]
        )->extends('layouts.main');
    }
}
