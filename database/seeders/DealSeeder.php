<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Imports\DealsImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class DealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $portfolio = $this->getPortfolio();
        if($portfolio) {
            Excel::import(new DealsImport($portfolio), public_path('Portfolio Deals.xlsx'));
        }
    }

    public function getPortfolio()
    {
        return Portfolio::where('name', 'WARBA')->first();
    }
}
