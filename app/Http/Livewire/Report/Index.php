<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use App\Models\Portfolio;

class Index extends Component
{
    public $portfolios;

    public $portfolio_id;
    public $from;
    public $to;

    protected $rules = [
        'portfolio_id' => 'required|integer',
        'from_date' => 'required|date',
        'to_date' => 'required|date'
    ];

    public function mount()
    {
        $this->portfolios = Portfolio::active()->get();
    }

    public function render()
    {
        return view('livewire.report.index')->extends('layouts.main');
    }
}
