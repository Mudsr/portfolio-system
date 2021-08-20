<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealRequest;
use App\Models\Deal;
use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals = Deal::all();

        return view('pages.deals.index', compact('deals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = User::clients()->get();
        $portfolios = Portfolio::all();

        return view('pages.deals.create', compact('clients', 'portfolios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DealRequest $request)
    {
        // dd($request->all());

        $deal = Deal::create([
            'portfolio_id' => $request->portfolio_id,
            'client_id' => $request->client_id,
        ]);

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

        $plot->addMediaFromRequest('pai_leasing_contract')
        ->withCustomProperties(
            [
                'pai_issue_date' => $request->pai_issue_date,
                'pai_expiry_Date' => $request->pai_expiry_Date,
            ]
        )->toMediaCollection('pai');

        $plot->addMediaFromRequest('fire_insurance_copy')
        ->withCustomProperties(
            [
                'fire_insurance_issue_date' => $request->fire_insurance_issue_date,
                'fire_insurance_expiry_Date' => $request->fire_insurance_expiry_Date,
            ]
        )->toMediaCollection('fire_insurance');

        $plot->addMediaFromRequest('power_of_attorney_copy')
        ->withCustomProperties(
            [
                'power_of_attorney_issue_date' => $request->power_of_attorney_issue_date,
                'power_of_attorney_expiry_Date' => $request->power_of_attorney_expiry_Date,
                'power_of_attorney_issue_to' => $request->power_of_attorney_issue_to,
            ]
        )->toMediaCollection('power_of_attorney');

        $plot->addMediaFromRequest('new_deal_email_attachment')->toMediaCollection('new_deal_email');
        $plot->addMediaFromRequest('poa_email_attachment')->toMediaCollection('poa_email_attachment');

        return redirect()->route('deals.index')->with('success','Deal created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
