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
                $this->deals = $this->portfolio->deals()
                    ->whereBetween('entry_date', [$date['from'], $date['to']]);

                    if($this->portfolio->fee_calculation_method == 'flat') {
                        $this->deals = $this->deals->with('plot')->get();

                        if($this->deals->count() > 0) {
                            $financeTotal = $this->deals->sum('plot.finance_amount');
                            $this->fee = $this->calculateFlatType($financeTotal);

                            $this->storeFee($this->fee);

                        }
                    } else if($this->portfolio->fee_calculation_method == 'proportionate') {
                        $this->deals = $this->deals->with('plot')->get();
                        if($this->deals->count() > 0) {
                            $financeTotal = $this->deals->sum('plot.finance_amount');
                            $plots = $this->deals->sum('plot.finance_amount');
                            $this->fee = $this->calculateProportionateType($financeTotal, $date);

                            $this->storeFee($this->fee);
                        }

                    }
            }
        }
    }

    private function calculateFlatType($financeTotal)
    {
        $toRange = $this->portfolio->management_fee['to'];
        $index = null;
        foreach ($toRange as $key => $range) {
            if($financeTotal < $range) {
                $index = $key;
                continue;
            }
        }
        if(isset($index)) {
            $percentageValue = $this->portfolio->management_fee['percentage'][$index];
        } else {
            $percentageValue = $this->portfolio->management_fee['percentage'][sizeof( $this->portfolio->management_fee['percentage']) - 1];
        }
        $percentage = $percentageValue/100;
        $x = $financeTotal * $percentage;
        $fee = $x/4;

        return $fee;
    }

    private function calculateProportionateType($financeTotal, $date)
    {
        $toRange = $this->portfolio->management_fee['to'];
        $index = null;

        foreach ($toRange as $key => $range) {
            if($financeTotal < $range) {
                $index = $key;
                continue;
            }
        }
        if(isset($index)) {
            $percentageValue = $this->portfolio->management_fee['percentage'][$index];
        } else {
            $percentageValue = $this->portfolio->management_fee['percentage'][sizeof( $this->portfolio->management_fee['percentage']) - 1];
        }

        $percentage = $percentageValue/100;
        $feeArray=[];

        foreach ($this->deals as $key => $deal) {
            $x = $deal->plot->finance_amount * $percentage;
            $fee = $x/360;

            $startDate = Carbon::parse($deal->entry_date);
            if(isset($deal->closed_at)) {
                $endDate = Carbon::parse($deal->closed_at);
            } else {
                $endDate = Carbon::parse($date['to']);
            }

            $daysCount = $startDate->diffInDays($endDate);
            $fee = $fee * $daysCount;
            array_push($feeArray, $fee);
        }

        $fee = array_sum($feeArray);

        return $fee;

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
