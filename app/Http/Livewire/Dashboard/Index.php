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

    public $days = 3;


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

    public function getPendingTasks()
    {
        $pendingTasks = $this->currentPortfolio->tasks()->where('completed_at', null)
            ->orWhere(function($query){
                $query->where('due_date', '<' , now())
                    ->where('completed_at', null);
            })
            ->with('client', 'portfolio')
            ->get();

        return $pendingTasks;
    }

    public function getUpcomingRenewals()
    {
        // dd(Carbon::now()->addDay($this->days));
        // $upcomingRenewals = $this->currentPortfolio->deals()->whereHas('plot', function($query){
        //     $query->whereHas('media', function($q){
        //         $q->where(function($q2){
        //                 $q2->where('custom_properties', '!=' , '[]')
        //                     ->where('custom_properties', '!=' , null);
        //             })->where('custom_properties->expiry_date' , '<' , Carbon::now()->addDay($this->days));
        //     });
        // })->get();

        $deals = $this->currentPortfolio->deals()->with('plot')->get();

        $plots = $deals->pluck('plot');

        // $upcomingRenewals = $upcomingRenewals->plot()->whereHas('media');

        // $upcomingRenewals = $this->currentPortfolio->deals()->plot();
        // dd($plots);

        return $plots;
    }

}
