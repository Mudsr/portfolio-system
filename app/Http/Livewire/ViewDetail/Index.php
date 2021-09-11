<?php

namespace App\Http\Livewire\ViewDetail;

use Livewire\Component;

class Index extends Component
{

    public $filter_by;
    public $portfolio_id;
    public $client_id;
    public $date_range;

    public $deals;

    public function mount()
    {
        $this->filter_by = 'portfolio';
        $this->deals = collect();
    }

    public function render()
    {
        return view('livewire.view-detail.index')->extends('layouts.main');
    }
}
