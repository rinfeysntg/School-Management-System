@extends('layoutenrollment')

@section('enrollment')
<div class="glass">
    <h1 class="heading">Payments</h1>
    <div class="frame">
        <form id="enrollStudentForm" action="{{ route('payments.store') }}" method="POST">
            @csrf
            <h4>Purpose: 
                <input type="text" class="form-control" id="purpose" name="purpose" required>
            </h4>
            <br>
            <h4>Amount: 
                <input type="number" class="form-control" id="amount" name="amount" required>
            </h4>    
            <h4>User: 
                <select class="dropdown" id="user_id" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            </h4>         
            <br>
            <div class="button-container">
                <button type="submit" class="btn">Create</button>
            </div>
        </form>
        <br>
    </div>
</div>
@endsection
