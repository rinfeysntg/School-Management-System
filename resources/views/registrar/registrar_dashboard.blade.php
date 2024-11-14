@extends('layout')

@section('content')

<div class="rec_dashboard">
    <div class="buttons">
        <br>
        <br>
        <br>
        <button id="dashboardBtn" class="btn btn-success">Announcements</button>
        <br>
        <button id="dashboardBtn" class="btn btn-success">Create Course</button>
        <br>
        <button id="dashboardBtn" class="btn btn-success">Create Curriculum</button>
        <br>
        <button id="dashboardBtn" class="btn btn-success">Buildings</button>
        <br>
        <button id="dashboardBtn" class="btn btn-success">Departments</button>
        <br>
        <br>
        <button id="logoutBtn" class="btn btn-danger">Logout</button>
    </div>
    <div class="logoContainer">
        <br>
        <br>
        <br>
        <h1 class="registrarLbl">Registrar</h1>
        <div class="logoDashboard"></div>
    </div>
</div>

@endsection