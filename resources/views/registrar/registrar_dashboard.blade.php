@extends('layout')

@section('content')

<div class="rec_dashboard">
    <div class="buttons">
        <br>
        <br>
        <br>
        <a><button id="dashboardBtn" class="btn btn-success">Announcements</button></a>
        <br>
        <a><button id="dashboardBtn" class="btn btn-success">Courses</button></a>
        <br>
        <a href="/curriculums"><button id="dashboardBtn" class="btn btn-success">Curriculums</button></a>
        <br>
        <a href="/buildings"><button id="dashboardBtn" class="btn btn-success">Buildings</button></a>
        <br>
        <a href="/departments"><button id="dashboardBtn" class="btn btn-success">Departments</button></a>
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