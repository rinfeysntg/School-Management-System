<!-- Payment Details Page -->
<h1>Payment Details</h1>
<p><strong>Amount:</strong> {{ $payment->amount }}</p>
<p><strong>Schedule:</strong> {{ $payment->schedule }}</p>
<p><strong>Status:</strong> {{ $payment->status }}</p>
<p><strong>Date:</strong> {{ $payment->created_at->format('M d, Y') }}</p>
