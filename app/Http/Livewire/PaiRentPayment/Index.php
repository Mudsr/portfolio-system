<?php

namespace App\Http\Livewire\PaiRentPayment;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pai-rent-payment.index')->extends('layouts.main');
    }
}
