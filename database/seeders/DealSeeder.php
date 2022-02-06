<?php

namespace Database\Seeders;

use App\Models\Deal;
use App\Models\Plot;
use App\Models\Task;
use App\Models\Merge;
use App\Models\Split;
use App\Models\Client;
use App\Models\Transfer;
use App\Models\Portfolio;
use App\Imports\DealsImport;
use App\Models\FeeCalculation;
use App\Models\PaiRentPayment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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
            // Excel::import(new DealsImport($portfolio), public_path('Portfolio Deals.xlsx'));
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Client::truncate();
            Deal::truncate();
            FeeCalculation::truncate();
            Media::truncate();
            Merge::truncate();
            PaiRentPayment::truncate();
            Plot::truncate();
            Split::truncate();
            Transfer::truncate();
            Task::truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            Excel::import(new DealsImport($portfolio), public_path('pf-data-new.xlsx'));
        }
    }

    public function getPortfolio()
    {
        return Portfolio::where('name', 'WARBA')->first();
    }
}
