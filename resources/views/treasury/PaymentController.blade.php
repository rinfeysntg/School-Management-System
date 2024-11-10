<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create()
    {
        return view('create_payments'); // Make sure this matches your Blade file
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);
        return redirect()->back()->with('success', 'Payment created successfully!');
    }
}