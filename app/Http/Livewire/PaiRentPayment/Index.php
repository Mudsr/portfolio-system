<?php

namespace App\Http\Livewire\PaiRentPayment;

use App\Models\PaiRentPayment;
use Livewire\Component;

class Index extends Component
{
    public $rents;

    public function mount()
    {
        $this->rents = PaiRentPayment::all();
    }

    public function render()
    {
        return view('livewire.pai-rent-payment.index')->extends('layouts.main');
    }
}
