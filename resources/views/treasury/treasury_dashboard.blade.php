@extends('layout')

@section('content')

<div class="rec_dashboard">
    <div class="buttons">
        <br>
        <br>
        <br>
        <br>
        <br>
        <a><button id="dashboardBtn" class="btn btn-success">Announcements</button></a>
        <br>
        <a><button id="dashboardBtn" class="btn btn-success">Payments</button></a>
        <br>
        <a><button id="dashboardBtn" class="btn btn-success">Payroll</button></a>
        <br>
        <br>
        <br>
        <br>
        <button id="logoutBtn" class="btn btn-danger">Logout</button>
    </div>
    <div class="logoContainer">
        <br>
        <br>
        <br>
        <h1 class="registrarLbl">Treasury</h1>
        <div class="logoDashboard"></div>
    </div>
</div>

@endsection