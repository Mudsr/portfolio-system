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
        $inActiveDeals = Deal::closed()->get();

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
        $portfolios = Portfolio::active()->get();

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
            'entry_date' => $request->entry_date,
        ]);

        $plot = $this->createPlot($deal, $request);
        $this->saveMedia($plot, $request);

        return redirect()->route('deals.index')->with('success','Deal created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Deal $deal)
    {
        $clients =Client::get();
        $portfolios = Portfolio::active()->get();

        return View('pages.deals.show', compact('deal', 'portfolios', 'clients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Deal $deal)
    {
        $clients =Client::get();
        $portfolios = Portfolio::active()->get();

        return View('pages.deals.edit', compact('deal', 'portfolios', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DealRequest $request, Deal $deal)
    {
        $deal->update([
            'portfolio_id' => $request->portfolio_id,
            'client_id' => $request->client_id,
            'plot_no' => $request->plot_no,
        ]);

        $plot = $deal->plot;
        $plot->update([
            'area_name' => $request->area_name??null,
            'block' => $request->block??null,
            'property_value' => $request->property_value??null,
            'finance_amount' => $request->finance_amount??null,
            'pai_rent' => $request->pai_rent??null,
            'licensed_purpose' => $request->licensed_purpose??null,
            'application_no' => $request->application_no??null,
            'plot_area_size' => $request->plot_area_size??null,
        ]);

        $this->saveMedia($plot, $request);

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
        $portfolios = Portfolio::active()->get();

        return View('pages.deals.renewal', compact('deal', 'portfolios', 'clients'));
    }

    /**
     * Save Deal renewed data
     *
     * @param Request $request
     * @param Deal $deal
     * @return void
     */
    public function renew(DealRequest $request, Deal $deal)
    {
        $deal->update([
            'portfolio_id' => $request->portfolio_id,
            'client_id' => $request->client_id,
            'plot_no' => $request->plot_no,
            'renewed_at' => $request->renewed_at,
            'type' => 'renewal',
        ]);

        $plot = $deal->plot;

        $this->saveMedia($plot, $request);

        return redirect()->route('deals.index')->with('success','Deal Renewed Successfully');
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
            'sold_to' => $request->sold_to,
        ]);

        return redirect()->route('deals.index')->with('success', 'Deal closed successfully');
    }

    private function createPlot($deal, $request)
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

        return $plot;
    }

    private function saveMedia($plot, $request)
    {
        if($request->file('pai_leasing_contract')) {
            // $plot->clearMediaCollection('pai');
            $plot->addMediaFromRequest('pai_leasing_contract')
            ->withCustomProperties(
                [
                    'issue_date' => $request->pai_issue_date,
                    'expiry_date' => $request->pai_expiry_Date,
                    'type' => 'pai'
                ]
            )->toMediaCollection('pai');
        }

        if($request->file('fire_insurance_copy')) {
            // $plot->clearMediaCollection('fire_insurance');
            $plot->addMediaFromRequest('fire_insurance_copy')
            ->withCustomProperties(
            [
                'issue_date' => $request->fire_insurance_issue_date,
                'expiry_date' => $request->fire_insurance_expiry_Date,
                'type' => 'fire_insurance'
            ]
            )->toMediaCollection('fire_insurance');
        }

        if($request->file('power_of_attorney_copy')) {
            // $plot->clearMediaCollection('power_of_attorney');
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

        if($request->file('new_deal_email_attachment')) {
            // $plot->clearMediaCollection('new_deal_email');
            $plot->addMediaFromRequest('new_deal_email_attachment')->toMediaCollection('new_deal_email');
        }

        if($request->file('poa_email_attachment')) {
            // $plot->clearMediaCollection('poa_email_attachment');
            $plot->addMediaFromRequest('poa_email_attachment')->toMediaCollection('poa_email_attachment');
        }

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

}
