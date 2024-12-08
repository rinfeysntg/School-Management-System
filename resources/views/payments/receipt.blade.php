@extends('layoutenrollmentEdit')

@section('enrollmentEdit')
<div class="glass">
    <h1 class="heading">Payment Receipt</h1>
    <div class="frame">
        <div class="receipt-content">
            <h4>Receipt ID: {{ $payment->id }}</h4>
            <h4>Purpose: {{ $payment->purpose }}</h4>
            <h4>Amount: ₱{{ number_format($payment->amount, 2) }}</h4>
            <h4>User: {{ $payment->user->name }}</h4>
            <h4>Date: {{ $payment->created_at->format('M d, Y') }}</h4>
            <br>

            <div class="button-container-receipt">
                <a href="{{ route('payments.index') }}" class="btn">Back to Payments</a>
            </div>
        </div>
    </div>
</div>
@endsection
