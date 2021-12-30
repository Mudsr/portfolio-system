<?php

namespace App\Http\Livewire\FeeCalculation;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Portfolio;
use App\Exports\PlotReport;
use App\Models\FeeCalculation;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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

                $query = $this->portfolio->deals()
                    ->where('entry_date', '<=', $date['to'])
                    ->where(fn ($query) =>
                        $query->where('closed_at', null)
                            ->orWhere(fn ($q) => $q->whereBetween('entry_date', [$date['from'], $date['to'] ]))
                    );

                $this->deals = $query->withCount([
                    'plot AS plot_finance_amount' => function ($query) {
                            $query->select(DB::raw("SUM(finance_amount) as financeAmountTotal"));
                        }
                    ])->with('plot')->get();

                if($this->deals->count() > 0 ) {

                    $financeTotal = $this->deals->sum('plot_finance_amount');

                    if($this->portfolio->fee_calculation_method == 'flat') {
                        $this->fee = $this->calculateFlatType($financeTotal);
                    }

                    if($this->portfolio->fee_calculation_method == 'proportionate') {
                        $this->fee = $this->calculateProportionateType($financeTotal, $date);
                    }

                    $this->storeFee($this->fee);

                }
            }
        }
    }

    private function calculateFlatType($financeTotal)
    {

        $percentageValue = $this->getPercentage($financeTotal);
        // $percentage = $percentageValue/100;
        $x = $financeTotal * $percentageValue;
        $fee = $x/4;

        return $fee;
    }

    private function calculateProportionateType($financeTotal, $date)
    {
        $percentageValue = $this->getPercentage($financeTotal);
        // $percentage = $percentageValue/100;
        $percentage = $percentageValue;
        $feeArray=[];

        foreach ($this->deals as $key => $deal) {
            $x = str_replace(',', '',$deal->plot->finance_amount) * $percentage;
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

    private function getPercentage($financeTotal)
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

        return $percentageValue;
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

    public function exportPdf()
    {
        $view = 'livewire.fee-calculation.listing';
        return Excel::download(new PlotReport($this->deals, $view), "management-fee-{$this->year}-quarter{$this->quarter}.pdf");

    }

    public function exportExcel()
    {
        $view = 'livewire.fee-calculation.listing';

        return Excel::download(new PlotReport($this->deals, $view), "management-fee-{$this->year}-quarter{$this->quarter}.xlsx");
    }
}
