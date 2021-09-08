<?php

namespace App\Http\Livewire\FeeCalculation;

use App\Models\FeeCalculation;
use App\Models\Portfolio;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    public $portfolios;

    public $portfolio_id;
    public $quarter;
    public $deals;
    public $fee;
    public $portfolio;
    public $year;

    public $yearsArray;

    protected $rules = [
        'portfolio_id' => 'required|integer',
        'quarter' => 'required|string',
        'year' => 'required'
    ];

    public function mount()
    {
        $this->portfolios = Portfolio::active()->get();
        $this->yearsArray = date('Y');
        $this->yearsArray = range($this->yearsArray, $this->yearsArray - 10);
    }
    public function render()
    {
        return view('livewire.fee-calculation.index')->extends('layouts.main');
    }
    public function updating()
    {
        $this->deals = null;
        $this->fee = null;
        $this->portfolio = null;
    }

    public function calculateFee()
    {
        $this->validate();



        $this->portfolio = Portfolio::find($this->portfolio_id);

        if(!empty($this->portfolio)) {
            $date = $this->getDate();
            if(isset($date)) {
                $this->deals = $this->portfolio->deals()->active()
                    ->whereBetween('entry_date', [$date['from'], $date['to']])
                    ->with('plot')
                    ->get();
                if(!empty($this->deals->count() > 0)) {
                    $financeTotal = $this->deals->sum('plot.finance_amount');
                    $this->fee = $this->calculate($financeTotal);
                    // dd($this->year);
                }
            }
        }
    }

    private function calculate($financeTotal)
    {
        switch ($this->portfolio->fee_calculation_method) {
            case 'proportionate':
                # code...
                break;

            default:
                $x = $financeTotal * $this->portfolio->management_fee;
                $fee = $x/4;

                // $this->storeFee($fee);

                return $fee;
        }

    }

    private function storeFee($fee)
    {
        $feeCalculation = $this->portfolio->feeCalculation()->updateOrCreate(
            [
                'quarter' => $this->quarter
            ],
            [
                'fee' => $fee,
                'quarter' => $this->quarter,
            ]
        );

    }

    private function getDate()
    {
        $dt = Carbon::create($this->year, 1, 1);

        $dt->addQuarter((int)$this->quarter - 1);

        return $date = [
            'from' => $dt->startOfQuarter()->toDateString(),
            'to' => $dt->endOfQuarter()->toDateString()
        ];

    }

}
