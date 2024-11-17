@extends('layout')

@section('content')
<div class="login">
    <form method="POST" action="{{ url('login') }}">
        @csrf
        <div class="row mb-3">
            <label class="row-sm-3 row-form-label" for="username">Username:</label>
            <input class="form-control" type="text" name="username" id="username" required>
        </div>
        <div class="row mb-3">
            <label class="row-sm-3 row-form-label" for="password">Password:</label>
            <input class="form-control" type="password" name="password" id="password" required>
        </div>
        <br>
        <button class="btn btn-success" type="submit">Login</button>

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
</div>
@endsection
