<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * Store a new payment in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'schedule' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id' // Assuming payments are linked to a user
        ]);

        // Create a new payment record
        $payment = Payment::create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'schedule' => $request->schedule,
            'status' => 'Pending', // Default status could be 'Pending' or 'Unpaid'
        ]);

        // Redirect to the payment confirmation page or show a success message
        return redirect()->route('payment.done')->with('success', 'Payment created successfully!');
    }

    /**
     * Show details of a specific payment by ID.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the payment by ID or fail
        $payment = Payment::findOrFail($id);

        // Return a view with payment details
        return view('payments.details', compact('payment'));
    }

    /**
     * Show the payment confirmation page.
     *
     * @return \Illuminate\Http\Response
     */
    public function done()
    {
        // Return the payment confirmation page
        return view('payments.done')->with('message', 'Your payment was processed successfully!');
    }
}
