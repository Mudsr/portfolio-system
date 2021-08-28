<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Http\Request;
use App\Http\Requests\SplitRequest;
use App\Models\Split;

class SplitController extends Controller
{
    public function save(SplitRequest $request)
    {
        $this->splitDeal($request);

        return redirect()->route('split.index')->with('success', 'Plot Splitted successfully');
    }

    private function splitDeal($request)
    {
        $oldDeal = Deal::find($request->deal_id);
        $oldDeal->update(['status' => 'close']);

        $deal = Deal::create([
            'portfolio_id' => $oldDeal->portfolio_id,
            'client_id' => $oldDeal->client_id,
            'plot_no' =>$request->plot1['plot_no'],
        ]);

        $plot1Data = $request->plot1;
        $plot1 = $this->createNewPlot($deal, $plot1Data);

        $deal = Deal::create([
            'portfolio_id' => $oldDeal->portfolio_id,
            'client_id' => $oldDeal->client_id,
            'plot_no' =>$request->plot2['plot_no'],
        ]);

        $plot2Data = $request->plot2;
        $plot2 = $this->createNewPlot($deal, $plot2Data);

        $split = Split::create([
            'portfolio_id' => $deal->portfolio_id,
            'plot_id' => $oldDeal->plot->id,
            'new_plots_ids' => [$plot1->id, $plot2->id],
        ]);

    }

    private function createNewPlot($deal, $data)
    {
        $plot = $deal->plot()->create([
            'area_name' => $data['area_name'],
            'block' => $data['block'],
            'property_value' => $data['property_value'],
            'finance_amount' => $data['finance_amount'],
            'pai_rent' => $data['pai_rent'],
            'licensed_purpose' => $data['licensed_purpose'],
            'application_no' => $data['application_no'],
            'plot_area_size' => $data['plot_area_size'],
        ]);

        $this->saveNewPlotDocument($plot, $data);

        return $plot;
    }

    private function saveNewPlotDocument($plot, $data)
    {
        $plot->addMedia($data['pai_leasing_contract'])
        ->withCustomProperties(
            [
                'pai_issue_date' => $data['pai_issue_date'],
                'pai_expiry_Date' => $data['pai_expiry_Date'],
            ]
        )->toMediaCollection('pai');

        $plot->addMedia($data['fire_insurance_copy'])
        ->withCustomProperties(
            [
                'fire_insurance_issue_date' => $data['fire_insurance_issue_date'],
                'fire_insurance_expiry_Date' => $data['fire_insurance_expiry_Date'],
            ]
        )->toMediaCollection('fire_insurance');

        $plot->addMedia($data['power_of_attorney_copy'])
        ->withCustomProperties(
            [
                'power_of_attorney_issue_date' => $data['power_of_attorney_issue_date'],
                'power_of_attorney_expiry_Date' => $data['power_of_attorney_expiry_Date'],
                'power_of_attorney_issue_to' => $data['power_of_attorney_issue_to'],
            ]
        )->toMediaCollection('power_of_attorney');

        $plot->addMedia($data['new_deal_email_attachment'])->toMediaCollection('new_deal_email');
        $plot->addMedia($data['poa_email_attachment'])->toMediaCollection('poa_email_attachment');
    }
}
