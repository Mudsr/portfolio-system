<?php

namespace Database\Seeders;

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
        Excel::import(new DealsImport, public_path('Portfolio Deals.xlsx'));
    }
}
