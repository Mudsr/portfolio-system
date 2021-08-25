<?php

namespace App\Http\Livewire\Transfer;

use App\Models\Transfer;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.transfer.index',['transfers' =>  Transfer::paginate(10)])->extends('layouts.main');
    }
}
