<?php

namespace App\Http\Livewire\FeeCalculation;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.fee-calculation.index')->extends('layouts.main');
    }
}
