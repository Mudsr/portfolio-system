<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('pages.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        $portfolio = Portfolio::create($request->except('_token'));
        $portfolio->addMediaFromRequest('agreement_document')->toMediaCollection('portfolios');

        return redirect()->route('portfolio.index')->with('success', 'Portfolio created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('pages.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        $portfolio->update($request->all());

        $portfolio->clearMediaCollection('portfolios');
        $portfolio->addMediaFromRequest('agreement_document')->toMediaCollection('portfolios');

        return redirect()->route('portfolio.index')->with('success', 'Portfolio updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        return redirect()->back()->with('success', 'Portfolio Deleted Successfully');
    }

    public function switchPortfolio(Request $request)
    {
        $currentPortfolio = Portfolio::getCurrentPortfolio();

        if($request->filled('portfolio') && $request->portfolio != $currentPortfolio->id ) {
            $portfolio = Portfolio::findorFail($request->portfolio);

            $currentPortfolio->update([
                'is_current' => false
            ]);

            $portfolio->update([
                'is_current' => true
            ]);
        }

        return redirect()->back();
    }

    public function closePortfolioForm(Portfolio $portfolio)
    {
        return view('pages.portfolio.close', compact('portfolio'));
    }

    public function closePortfolio(PortfolioRequest $request, Portfolio $portfolio)
    {
        $portfolio->update([
            'closing_date' => $request->closing_date,
            'closing_reason' => $request->closing_reason,
            'closing_remarks' => $request->closing_remarks,
            'management_fee_last_calculated_at' => $request->management_fee_last_calculated_at,

        ]);

        return redirect()->route('portfolio.index')->with('success', 'Portfolio Closed Successfully');
    }
}
