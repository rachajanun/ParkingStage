<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $transaction=Transaction::where('user_id',session("userId"))->first();
        $transaction->payment_status='completed';
        $transaction->save();
        $payment=new Payment();
        $payment->transaction_id=$transaction->id;
        $payment->amount=$transaction->total;
        $payment->paid_at=Carbon::now()->format('Y-m-d H:i:s');
        $payment->status='Completed';
        $payment->save();
        return response()->json($payment,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
        $user = $payment->user; // Assuming you have defined the relationship between Payment and User
        return response()->json($user);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
