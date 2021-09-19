<?php

namespace App\Imports;

use App\Models\Deal;
use App\Models\Plot;
use App\Models\Client;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DealsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        if($row['sr_no'] == "م" && $row['area'] == "المنطقة " ) {
            return null;
        }

        if(!isset($row['sr_no'])) {
            return null;
        }

        $portfolio = $this->getPortfolio();
        $client = Client::create([
            'name' => $row['client_name'],
        ]);

        $deal = $client->deals()->create([
            'portfolio_id' => $portfolio->id,
            'plot_no' => $row['plot_no'],
            'entry_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_of_contract']),
        ]);

        return new Plot([
            'area_name'     => $row['area'],
            'block'    => $row['block'],
            'property_value' => $row['finance_amount'],
            'finance_amount' => $row['finance_amount'],
            'deal_id' => $deal->id,
        ]);
    }

    public function getPortfolio()
    {
        return Portfolio::where('name', 'portfolio2')->first();
    }

}
