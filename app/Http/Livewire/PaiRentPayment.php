<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class PaiRentPayment extends Component
{
    public $clients;
    public $deals;
    public $client_id;

    public function render()
    {
        return view('livewire.pai-rent-payment')->extends('layouts.main');;
    }

    public function updatedClientId()
    {
        $client = Client::find($this->client_id);
        $this->deals = $client->deals;
    }
}
