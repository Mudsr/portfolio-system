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
        $this->count = 0;

        if(isset($portfolio)){
            $this->from = $portfolio->management_fee['from'];
            $this->to = $portfolio->management_fee['to'];
            $this->percentage = $portfolio->management_fee['percentage'];

            for ($i = 0; $i < sizeof($portfolio->management_fee['from']); $i++) {
                array_push($this->ranges, $i);
            }
        } else {
            array_push($this->ranges, $this->count);

        }
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
