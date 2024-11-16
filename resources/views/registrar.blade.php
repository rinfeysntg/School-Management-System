@extends('layout')

@section('content')
<div class="glass">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row mb-3">
            <label for="inputEmail" class="row-sm-3 row-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="inputEmail" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword" class="row-sm-3 row-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="inputPassword" required>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Login</button>
    </form>
</div>
@endsection
