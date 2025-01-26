@extends('layout')

@section('content')
<div class="login">
    <form method="POST" action="{{ route('update_password') }}">
        @csrf
        <div class="glass">
            <div class="row mb-3">
                <label class="row-sm-3 row-form-label" for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <div class="row mb-3">
                <label class="row-sm-3 row-form-label" for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" required>
            </div>
            <br>
            <div class="loginbtn-container">
                <button class="btn btn-success" type="submit">Update Password</button>
            </div>
        </div>
    </form>

    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ route('logout') }}">
            <button class="btn btn-danger">Log Out</button>
        </a>
    </div>

    @if(session('error'))
    <script type="text/javascript">
        alert("{{ session('error') }}");
    </script>
    @endif
    
</div>
@endsection
