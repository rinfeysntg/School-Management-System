@extends('layoutenrollmentEdit')

@section('enrollmentEdit')
<div class="glass">
    <h1 class="heading">Edit Payment</h1>
    <div class="frame">
        <form id="updateStudentForm" action="{{ route('payments.update', $payment->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <h4>Purpose: 
                <input type="text" class="form-control" id="purpose" name="purpose" value="{{ old('purpose', $payment->purpose) }}" required>
            </h4>
            <br>

            <h4>Amount: ₱ 
                <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount', $payment->amount) }}" required>
            </h4>    

            <h4>User: 
                <select class="dropdown" id="user_id" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $payment->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
                </select>
            </h4>         
            <br>

            <div class="button-container">
                <button type="submit" class="btn">Update Payment</button>
            </div>
        </form>
        <br>
    </div>
</div>
@endsection
