@extends('layout')

@section('content')

<div class="rec_dashboard">
    <div class="buttons">
        <br>
        <br>
        <br>
        <a><button id="dashboardBtn" class="btn btn-success">Profile</button></a>
        <br>
        <a><button id="dashboardBtn" class="btn btn-success">Announcements</button></a>
        <br>
        <a><button id="dashboardBtn" class="btn btn-success">Academics</button></a>
        <br>
        <a><button id="dashboardBtn" class="btn btn-success">Attendance</button></a>
        <br>
        <a><button id="dashboardBtn" class="btn btn-success">Enrollment</button></a>
        <br>
        <br>
        <button id="logoutBtn" class="btn btn-danger">Logout</button>
    </div>
    <div class="logoContainer">
        <br>
        <br>
        <br>
        <h1 class="registrarLbl">Welcome</h1>
        <div class="logoDashboard"></div>
    </div>
</div>

@endsection