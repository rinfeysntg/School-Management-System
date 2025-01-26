@extends('layout')

@section('content')
<div class="login">
    <form method="POST" action="{{ url('login') }}">
        @csrf
        <div class="glass">
        <div class="row mb-3">
            <label class="row-sm-3 row-form-label" for="username">Username:</label>
            <input class="form-control" type="text" name="username" id="username" required>
        </div>
        <div class="row mb-3">
            <label class="row-sm-3 row-form-label" for="password">Password:</label>
            <input class="form-control" type="password" name="password" id="password" required>
        </div>
        <br>
        <div class="loginbtn-container">
        <button class="btn btn-success" type="submit">Login</button>
        </div>
        </div>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
    <br>
    <div class="loginbtn-container">
    <a href="{{ route('dtr.form') }}"><button class="btn btn-info">DTR</button><a>
    </div>
</div>
@endsection