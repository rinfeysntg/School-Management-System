
<h1>Payment History</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Amount</th>
            <th>Schedule</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->schedule }}</td>
                <td>{{ $payment->status }}</td>
                <td>{{ $payment->created_at->format('M d, Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
