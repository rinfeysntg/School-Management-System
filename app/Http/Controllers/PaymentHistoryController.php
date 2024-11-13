<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentHistoryController extends Controller
{
    /**
     * Display a list of all payments (payment history).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all payments, or you can filter them as needed (e.g., by user)
        $payments = Payment::all();

        // Return the payment history view with the payments data
        return view('payments.history', compact('payments'));
    }
}
