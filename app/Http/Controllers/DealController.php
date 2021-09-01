<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\User;
use App\Models\Client;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Requests\DealRequest;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tab = 'active';

        $activeDeals = Deal::active()->get();
        $inActiveDeals = Deal::inActive()->get();

        if($request->filled('q') && $request->filled('t')) {
            if($request->t == 'a'){
                $activeDeals = Deal::active()
                    ->where(
                        fn($query) =>
                            $query->where('id', 'LIKE', "%{$request->q}%")
                            ->orWhere('plot_no', 'LIKE', "%{$request->q}%")
                            ->orWhereHas(
                                'client', fn($query) =>
                                    $query->where('id',  'LIKE', "%{$request->q}%")
                                        ->orWhere('name',  'LIKE', "%{$request->q}%")
                                        ->orWhere('telephone',  'LIKE', "%{$request->q}%")
                                        ->orWhere('id_no',  'LIKE', "%{$request->q}%")
                            )
                    )
                    ->get();
            }

            if($request->t == '!a') {
                $inActiveDeals = Deal::inActive()
                ->where(
                    fn($query) =>
                        $query->where('id', 'LIKE', "%{$request->q}%")
                        ->orWhere('plot_no','LIKE', "%{$request->q}%")
                        ->orWhereHas(
                            'client', fn($query) =>
                                $query->where('id',  'LIKE', "%{$request->q}%")
                                    ->orWhere('name',  'LIKE', "%{$request->q}%")
                                    ->orWhere('telephone',  'LIKE', "%{$request->q}%")
                                    ->orWhere('id_no',  'LIKE', "%{$request->q}%")
                        )
                )
                ->get();

                $tab = 'in-active';
            }
        }



        return view('pages.deals.index', compact('activeDeals', 'inActiveDeals', 'tab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::get();
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
        $deal = Deal::create([
            'portfolio_id' => $request->portfolio_id,
            'client_id' => $request->client_id,
            'plot_no' => $request->plot_no,
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

        if($request->hasFile('pai_leasing_contract')) {
            $plot->addMediaFromRequest('pai_leasing_contract')
            ->withCustomProperties(
                [
                    'pai_issue_date' => $request->pai_issue_date,
                    'pai_expiry_Date' => $request->pai_expiry_Date,
                ]
            )->toMediaCollection('pai');
        }

        if ($request->hasFile('fire_insurance_copy')) {
            $plot->addMediaFromRequest('fire_insurance_copy')
            ->withCustomProperties(
                [
                    'fire_insurance_issue_date' => $request->fire_insurance_issue_date,
                    'fire_insurance_expiry_Date' => $request->fire_insurance_expiry_Date,
                ]
            )->toMediaCollection('fire_insurance');
        }

        if ($request->hasFile('power_of_attorney_copy')) {
            $plot->addMediaFromRequest('power_of_attorney_copy')
            ->withCustomProperties(
                [
                    'power_of_attorney_issue_date' => $request->power_of_attorney_issue_date,
                    'power_of_attorney_expiry_Date' => $request->power_of_attorney_expiry_Date,
                    'power_of_attorney_issue_to' => $request->power_of_attorney_issue_to,
                ]
            )->toMediaCollection('power_of_attorney');
        }

        if($request->hasFile('new_deal_email_attachment')) {
            $plot->addMediaFromRequest('new_deal_email_attachment')->toMediaCollection('new_deal_email');
        }

        if($request->hasFile('poa_email_attachment')) {
            $plot->addMediaFromRequest('poa_email_attachment')->toMediaCollection('poa_email_attachment');
        }

        if($request->hasFile('extra_attachments')) {
            $plot->addMediaFromRequest('extra_attachments')->toMediaCollection('extras');
        }

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
    public function update(Request $request, Deal $deal)
    {
        $deal->update([
            'portfolio_id' => $request->portfolio_id,
            'client_id' => $request->client_id,
            'plot_no' => $request->plot_no,
            'type' => 'renewal',
        ]);

        $plot = $deal->plot;

        if($request->file('pai_leasing_contract')) {
            // $plot->clearMediaCollection('pai');
            $plot->addMediaFromRequest('pai_leasing_contract')
            ->withCustomProperties(
                [
                    'pai_issue_date' => $request->pai_issue_date,
                    'pai_expiry_Date' => $request->pai_expiry_Date,
                ]
            )->toMediaCollection('pai');
        }

        if($request->file('fire_insurance_copy')) {
            // $plot->clearMediaCollection('fire_insurance');
            $plot->addMediaFromRequest('fire_insurance_copy')
            ->withCustomProperties(
            [
                'fire_insurance_issue_date' => $request->fire_insurance_issue_date,
                'fire_insurance_expiry_Date' => $request->fire_insurance_expiry_Date,
            ]
            )->toMediaCollection('fire_insurance');
        }

        if($request->file('power_of_attorney_copy')) {
            // $plot->clearMediaCollection('power_of_attorney');
            $plot->addMediaFromRequest('power_of_attorney_copy')
            ->withCustomProperties(
                [
                    'power_of_attorney_issue_date' => $request->power_of_attorney_issue_date,
                    'power_of_attorney_expiry_Date' => $request->power_of_attorney_expiry_Date,
                    'power_of_attorney_issue_to' => $request->power_of_attorney_issue_to,
                ]
            )->toMediaCollection('power_of_attorney');
        }

        if($request->file('new_deal_email_attachment')) {
            $plot->clearMediaCollection('new_deal_email');
            $plot->addMediaFromRequest('new_deal_email_attachment')->toMediaCollection('new_deal_email');
        }

        if($request->file('poa_email_attachment')) {
            $plot->clearMediaCollection('poa_email_attachment');
            $plot->addMediaFromRequest('poa_email_attachment')->toMediaCollection('poa_email_attachment');
        }


        return redirect()->route('deals.index')->with('success','Deal Renewed Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deal $deal)
    {
        $deal->delete();

        return redirect()->route('deals.index')->with('success', 'Deal deleted successfully');
    }

    /**
     * get renew form
     *
     * @param Deal $deal
     * @return void
     */
    public function renewForm(Deal $deal)
    {
        $clients =Client::get();
        $portfolios = Portfolio::all();

        return View('pages.deals.renewal', compact('deal', 'portfolios', 'clients'));
    }

    /**
     * process renewal of deal
     *
     * @param Deal $deal
     * @return void
     */
    public function renew(Deal $deal)
    {
        $clients =Client::get();
        $portfolios = Portfolio::all();

        return View('pages.renewal', compact('deal', 'portfolios', 'clients'));
    }

    /**
     * get closing form
     *
     * @param Deal $deal
     * @return void
     */
    public function closeForm(Deal $deal)
    {
        return view('pages.deals.close',compact('deal'));
    }

    /**
     * process closing of deal
     *
     * @param Deal $deal
     * @return void
     */
    public function closeDeal(DealRequest $request,Deal $deal)
    {
        $deal->update([
            'closed_at' => $request->closing_date,
        ]);

        return redirect()->route('deals.index')->with('success', 'Deal closed successfully');
    }

    // public function activeDeals(Request $request)
    // {
    //     if($request->ajax()) {
    //         $activeDeals = Deal::with('plot', 'portfolio', 'client')->active()->get();
    //         // $inActiveDeals = Deal::with('plot', 'portfolio', 'client')->inActive()->get();

    //         return response()->json([
    //             'data' => $activeDeals,
    //         ]);
    //     }
    // }

    public function searchDeals(Request $request)
    {

    }
}
