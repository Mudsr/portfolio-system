<?php

namespace App\Http\Livewire\Dashboard;

use Carbon\Carbon;
use App\Models\Task;
use Livewire\Component;
use App\Models\Portfolio;
use phpDocumentor\Reflection\Types\Nullable;

class Index extends Component
{
    public $pendingTasks;
    public $upcomingRenewals;
    public $alerts;
    public $currentPortfolio;
    public $portfolios;
    public $plots;
    public $contractRenewals;
    public $upcomingRents;

    public $renewals_filter = 7;
    public $tasks_filter = 7;
    public $contracts_renewal_filter = 7;
    public $rents_filter = 7;


    public function mount()
    {
        $this->portfolios = Portfolio::active()->get();
        $this->currentPortfolio = Portfolio::getCurrentPortfolio();
        $this->pendingTasks = $this->getPendingTasks();
        $this->plots = $this->getUpcomingRenewals();
        $this->contractRenewals = $this->getUpcomingContractRenewals();
    }

    public function render()
    {
        return view('livewire.dashboard.index')->extends('layouts.main');
    }

    public function updatedRenewalsFilter()
    {
        $this->portfolios = Portfolio::active()->get();
        $this->currentPortfolio = Portfolio::getCurrentPortfolio();
        $this->plots = $this->getUpcomingRenewals();
        $this->contractRenewals = $this->getUpcomingContractRenewals();
    }

    public function updatedTasksFilter()
    {
        $this->portfolios = Portfolio::active()->get();
        $this->currentPortfolio = Portfolio::getCurrentPortfolio();
        $this->pendingTasks = $this->getPendingTasks();
        $this->contractRenewals = $this->getUpcomingContractRenewals();
    }

    public function updatedRentsFilter()
    {
        $this->portfolios = Portfolio::active()->get();
        $this->currentPortfolio = Portfolio::getCurrentPortfolio();
        $this->pendingTasks = $this->getPendingTasks();
        $this->contractRenewals = $this->getUpcomingContractRenewals();
    }

    public function updatedContractsRenewalFilter()
    {
        $this->portfolios = Portfolio::active()->get();
        $this->currentPortfolio = Portfolio::getCurrentPortfolio();
        $this->pendingTasks = $this->getPendingTasks();
        $this->contractRenewals = $this->getUpcomingContractRenewals();
    }

    public function getPendingTasks($startDate = null, $endDate = null)
    {
        if ($this->currentPortfolio) {
            $pendingTasks = $this->currentPortfolio
                ->tasks()
                ->where('completed_at', null)
                ->orWhere(function ($query) {
                    $query->where('due_date', '<',  Carbon::now()->subDays($this->tasks_filter)->format('Y-m-d'))
                        ->where('completed_at', null);
                })
                ->with('client', 'portfolio')
                ->get();

            return $pendingTasks;
        }

        return null;
    }

    public function getUpcomingRenewals()
    {
        $datefrom = Carbon::now()->format('Y-m-d');
        $dateto = Carbon::now()->addDays($this->renewals_filter)->format('Y-m-d');

        if ($this->currentPortfolio) {
            $deals = $this->currentPortfolio
                ->deals()
                ->whereHas('plot', function ($query) use ($datefrom,$dateto) {
                    $query->whereHas('media',function($q) use ($datefrom,$dateto) {
                        $q->where('custom_properties->type', '!=', 'pai')
                        ->whereBetween('custom_properties->expiry_date',[$datefrom,$dateto]);
                    });
                })
                ->with('plot')
                ->with('plot.media', function($q) use ($datefrom,$dateto) {
                    $q->where('custom_properties->type', 'pai')
                        ->whereBetween('custom_properties->expiry_date',[$datefrom,$dateto]);
                })->get();

            $data = $deals->pluck('plot');
            return $data;
        }

        return null;
    }

    public function getUpcomingContractRenewals()
    {
        $datefrom = Carbon::now()->format('Y-m-d');
        $dateto = Carbon::now()->addDays($this->contracts_renewal_filter)->format('Y-m-d');

        if ($this->currentPortfolio) {
            $deals = $this->currentPortfolio
                ->deals()
                ->whereHas('plot', function ($query) use ($datefrom,$dateto) {
                    $query->whereHas('media', function($q) use ($datefrom,$dateto) {
                        $q->where('custom_properties->type', 'pai')
                            ->whereBetween('custom_properties->expiry_date',[$datefrom,$dateto]);

                    });
                })
                ->with('plot')
                ->with('plot.media', function($q) use ($datefrom,$dateto) {
                    $q->where('custom_properties->type', 'pai')
                    ->whereBetween('custom_properties->expiry_date',[$datefrom,$dateto]);
                })->get();

            $data = $deals->pluck('plot');
            return $data;
        }

        return null;
    }
}
