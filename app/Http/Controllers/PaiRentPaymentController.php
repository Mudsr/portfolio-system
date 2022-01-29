<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaiRentPaymentRequest;
use App\Models\Client;
use App\Models\Deal;
use App\Models\PaiRentPayment;
use Illuminate\Http\Request;

class PaiRentPaymentController extends Controller
{
    public $client_id;
    public function index()
    {
        return view('pages.pai-rent-payment.index');
    }
    public function create()
    {
        $clients = Client::all();
        $deals = Deal::all();
        
        return view('pages.pai-rent-payment.create', compact('clients', 'deals'));
    }

    public function save(PaiRentPaymentRequest $request)
    {
        $rent = PaiRentPayment::create($request->except('_token'));

        if($request->file('receipt_voucher')) {
            $rent->addMediaFromRequest('receipt_voucher')->toMediaCollection('receipt_voucher');
        }
        return redirect()->route('pai.rent.payment')->with('success', 'Pai Rent Payment have been saved successfully');
    }
}
