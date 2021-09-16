<?php

namespace App\Http\Livewire\PaiRentPayment;

use App\Models\Client;
use App\Models\Deal;
use App\Models\PaiRentPayment;
use Livewire\Component;

class Create extends Component
{

    public $client_id;
    public $client_name;
    public $deal_id;
    public $entry_date;
    public $from_date;
    public $to_date;
    public $comments;


    public $clients;
    public $deals;

    protected $rules = [
        'client_id' => ['required', 'integer'],
        'deal_id' => ['required', 'integer'],
        'entry_date' => ['required','date' ],
        'from_date' => ['required','date'],
        'to_date' => ['required', 'date', 'after:from_date'],
        'comments' => ['required','string'],
    ];

    public function mount()
    {
        $this->clients = Client::all();
        $this->deals = Deal::all();
    }

    public function render()
    {
        return view('livewire.pai-rent-payment.create')->extends('layouts.main');
    }

    public function submit()
    {
        $rent = PaiRentPayment::create([

        ]);
    }

    public function updatedClientName()
    {
        
    }
}
