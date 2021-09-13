<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Merge;
use Illuminate\Http\Request;
use App\Http\Requests\MergeRequest;

class MergeController extends Controller
{
    public function save(MergeRequest $request)
    {
        $this->mergeDeal($request);

        return redirect()->route('merge.index')->with('success', 'Deals merged successfully');
    }

    private function mergeDeal($request)
    {
        $deal1 = Deal::find($request->deal1);
        $deal = Deal::create([
            'portfolio_id' => $deal1->portfolio_id,
            'client_id' => $deal1->client_id,
            'plot_no' => $request->plot_no,
            'entry_Date' => $request->entry_date,
            'type' => 'merge',
        ]);

        $merge = Merge::create([
            'portfolio_id' => $deal1->portfolio_id,
            'new_deal_id' => $deal->id,
            'old_deal_ids' => [$request->deal1, $request->deal2],
            'entry_Date' => $request->entry_date
        ]);

        $this->createNewPlot($deal, $request);

        $this->closeOldDeals($request);
    }

    public function closeOldDeals($request)
    {
        Deal::whereIn('id', [$request->deal1, $request->deal2])->update([
            'type' => 'merge',
            'closed_at' => now(),
        ]);
    }

    private function createNewPlot($deal, $request)
    {
        $plot = $deal->plot()->create([
            'area_name' => $request->area_name,
            'block' => $request->block,
            'property_value' => $request->property_value,
            'finance_amount' => $request->finance_amount,
            'pai_rent' => $request->pai_rent,
            'licensed_purpose' => $request->licensed_purpose,
            'application_no' => $request->application_no,
            'plot_area_size' => $request->plot_area_size,
        ]);

        $this->saveNewPlotDocument($plot, $request);
    }

    private function saveNewPlotDocument($plot, $request)
    {
        if($request->hasFile('pai_leasing_contract')) {
            $plot->addMediaFromRequest('pai_leasing_contract')
            ->withCustomProperties(
                [
                    'issue_date' => $request->pai_issue_date,
                    'expiry_date' => $request->pai_expiry_Date,
                    'type' => 'pai'
                ]
            )->toMediaCollection('pai');
        }

        if($request->hasFile('fire_insurance_copy')){
            $plot->addMediaFromRequest('fire_insurance_copy')
            ->withCustomProperties(
                [
                    'issue_date' => $request->fire_insurance_issue_date,
                    'expiry_date' => $request->fire_insurance_expiry_Date,
                    'type' => 'fire_insurance'
                ]
            )->toMediaCollection('fire_insurance');
        }

        if ($request->hasFile('power_of_attorney_copy')) {
            $plot->addMediaFromRequest('power_of_attorney_copy')
            ->withCustomProperties(
                [
                    'issue_date' => $request->power_of_attorney_issue_date,
                    'expiry_date' => $request->power_of_attorney_expiry_Date,
                    'issue_to' => $request->power_of_attorney_issue_to,
                    'type' => 'power_of_attorney'
                ]
            )->toMediaCollection('power_of_attorney');
        }

        if($request->hasFile('new_deal_email_attachment')) {
            $plot->addMediaFromRequest('new_deal_email_attachment')->toMediaCollection('new_deal_email');
        }

        if($request->hasFile('poa_email_attachment')) {
            $plot->addMediaFromRequest('poa_email_attachment')->toMediaCollection('poa_email_attachment');
        }
    }
}
