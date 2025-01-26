@extends('layoutenrollmentTable')

@section('enrollmentTable')
<div class="glass">
    <h1 class="heading">Payments</h1>

    <form method="GET" action="{{ route('paymentSearch') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by Name" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    
    <div class="table-responsive">
        <table class="table table-success table-striped">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Purpose</th>
                    <th scope="col">Amount</th>
                    <th scope="col">User</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->purpose }}</td>
                        <td>₱{{ number_format($payment->amount, 2) }}</td>
                        <td>{{ $payment->user->name }}</td>
                        
                        <td>
                            <a href="{{ route('payments.receipt', $payment->id) }}" class="view-btn">View Receipt</a>
                            <a href="{{ route('payments.edit', $payment->id) }}" class="edit-btn">Edit</a>
                            <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this payment?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
    
    <div class="button-container" style="display: flex; flex-direction: row; gap: 10px;">
        <a href="{{ route('treasury') }}"><button class="btn">Return</button></a>
        <a href="{{ route('payments.create') }}" class="btn">Create Payment</a>      
    </div>
</div>
@endsection
