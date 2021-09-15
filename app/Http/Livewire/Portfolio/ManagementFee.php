<?php

namespace App\Http\Livewire\Portfolio;

use App\Models\Portfolio;
use Livewire\Component;

class ManagementFee extends Component
{
    public $from;
    public $to;
    public $percentage;
    public $ranges= [];
    public $count;

    public $portfolio;

    public function mount($portfolio = null)
    {
        $this->count = 1;
        array_push($this->ranges, $this->count);
    }

    public function render()
    {
        return view('livewire.portfolio.management-fee');
    }

    public function addManagementFeeRangeFields()
    {
        $this->count++;
        array_push($this->ranges, $this->count);
    }

    public function removeField($key)
    {
        unset($this->ranges[$key]);
    }
}
