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
    public $portfolio;

    public function __construct($portfolio) {
        $this->portfolio = $portfolio;
    }
    /**
     * @param array $row
     *
     * array:10 [
        "m" => 1
        "almntk" => "الشويخ الصناعية  2" area
        "alktaa" => "ب" block
        "tarykh_alaakd" => 43404
        "tarykh_nhay_alaakd" => 45229 contract_date
        "rkm_alksym" => "150/149" plot num
        "asm_alaamyl" => "احمد نوري سليمان القناعي" client name
        "mblgh_altmoyl" => 2560000 finance amount
        "kym_alaakarat" => 4612500 property value
        "" => null
        ]
     *
     * @return User|null
     */
    public function model(array $row)
    {
        if(!isset($row['m'])) {
            return null;
        }

        $client = Client::create([
            'name' => $row['asm_alaamyl'],
        ]);

        $deal = $client->deals()->create([
            'portfolio_id' => $this->portfolio->id,
            'plot_no' => $row['rkm_alksym'],
            'entry_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tarykh_nhay_alaakd']),
        ]);

        return new Plot([
            'area_name'     => $row['almntk'],
            'block'    => $row['alktaa'],
            'property_value' => str_replace(',', '', $row['mblgh_altmoyl']),
            'finance_amount' => str_replace(',', '', $row['mblgh_altmoyl']),
            'deal_id' => $deal->id,
        ]);
    }

}
