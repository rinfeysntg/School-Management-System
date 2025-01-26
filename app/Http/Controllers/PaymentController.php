<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Users;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('user')->get(); 
        return view('payments.index', compact('payments')); 
    }

    public function create()
    {
        $users = Users::all(); 
        return view('payments.create', compact('users')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'purpose' => 'required|string|max:255',
            'amount' => 'required|integer|min:1',
            'user_id' => 'required|exists:users,id', 
        ]);

        $payment = Payment::create([
            'purpose' => $request->purpose,
            'amount' => $request->amount,
            'user_id' => $request->user_id,
        ]);
    
        return redirect()->route('payments.receipt', ['id' => $payment->id])
                     ->with('success', 'Payment added successfully!');
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id); 
        $users = Users::all(); 
        return view('payments.edit', compact('payment', 'users')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'purpose' => 'required|string|max:255',
            'amount' => 'required|integer|min:1',
            'user_id' => 'required|exists:users,id', 
        ]);

        $payment = Payment::findOrFail($id); 
        $payment->update([
            'purpose' => $request->purpose,
            'amount' => $request->amount,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully!');
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id); 
        $payment->delete(); 

        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully!');
    }

    public function showReceipt($id)
    {
        $payment = Payment::with('user')->findOrFail($id);

        return view('payments.receipt', compact('payment'));
    }

    public function searchUsers(Request $request)
    {
        $search = $request->input('search', '');

        $users = Users::where('name', 'LIKE', "%$search%")
                    ->orWhere('id', 'LIKE', "%{$search}%")->get();

        return response()->json($users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
            ];
        }));
    }

    public function paymentSearch(Request $request)
    {
        $search = $request->input('search');

        $payments = Payment::with('user')
            ->when($search, function ($query, $search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                });
            })
            ->paginate(10);

        return view('payments.index', compact('payments'));
    }

}
