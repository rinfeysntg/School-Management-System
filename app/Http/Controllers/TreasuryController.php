<?php

// app/Http/Controllers/TreasuryController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TreasuryController extends Controller
{
    // Display the main dashboard view
    public function dashboard()
    {
        return view('treasury_dashboard');
    }

    // Display the Create Payment view
    public function createPayment()
    {
        return view('treasury.create_payment');
    }

    // Display the Tuition Payments view
    public function tuitionPayments()
    {
        return view('treasury.tuition_payments');
    }

    // Display the User Accounts view
    public function userAccounts()
    {
        return view('treasury.user_accounts');
    }

    // Display the Financial Analytics view
    public function financialAnalytics()
    {
        return view('treasury.financial_analytics');
    }
}
