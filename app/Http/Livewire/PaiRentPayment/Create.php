<?php

namespace App\Http\Livewire\PaiRentPayment;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.pai-rent-payment.create')->extends('layouts.main');
    }
}
