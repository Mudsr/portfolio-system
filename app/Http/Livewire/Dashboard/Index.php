<?php

namespace App\Http\Livewire\Dashboard;

use Carbon\Carbon;
use App\Models\Task;
use Livewire\Component;
use App\Models\Portfolio;

class Index extends Component
{
    public $pendingTasks;
    public $upcomingRenewals;
    public $alerts;
    public $currentPortfolio;
    public $portfolios;
    public $plots;

    public $renewals_filter = 7;
    public $tasks_filter = 7;


    public function mount()
    {
        $this->portfolios = Portfolio::active()->get();
        $this->currentPortfolio = Portfolio::getCurrentPortfolio();
        $this->pendingTasks = $this->getPendingTasks();
        // $this->upcomingRenewals = $this->getUpcomingRenewals();
        $this->plots = $this->getUpcomingRenewals();
    }

    public function render()
    {
        return view('livewire.dashboard.index')->extends('layouts.main');
    }

    public function updatedRenewalsFilter()
    {
        $this->portfolios = Portfolio::active()->get();
        $this->currentPortfolio = Portfolio::getCurrentPortfolio();
        // $this->upcomingRenewals = $this->getUpcomingRenewals();
        $this->plots = $this->getUpcomingRenewals();
    }

    public function updatedTasksFilter()
    {
        $this->portfolios = Portfolio::active()->get();
        $this->currentPortfolio = Portfolio::getCurrentPortfolio();
        $this->pendingTasks = $this->getPendingTasks();
        // $this->upcomingRenewals = $this->getUpcomingRenewals();
        $this->plots = $this->getUpcomingRenewals();
    }

    public function getPendingTasks($startDate = null, $endDate = null)
    {
        if ($this->currentPortfolio) {
            $pendingTasks = $this->currentPortfolio->tasks()->where('completed_at', null)
                ->orWhere(function ($query) {
                    $query->where('due_date', '<', now())
                        ->where('completed_at', null);
                })
                ->with('client', 'portfolio')
                ->get();

            return $pendingTasks;
        }
    }

    public function getUpcomingRenewals()
    {
        if ($this->currentPortfolio) {
            $deals = $this->currentPortfolio->deals()->with('plot')->get();
            $plots = $deals->pluck('plot');
            return $plots;
        }
    }
}
