@extends('layoutregistrar')

@section('registrardashboard')
<div class="glass">
        <img src="../images/wupLogo.png" alt="meh" class="dashboardLogo">
    <div class="button-container">
        <button class="btn">Announcements</button>
        <a href="{{ route('course') }}"><button class="btn">Create Course</button></a>
        <a href="{{ route('curriculum') }}"><button class="btn">Create Curriculum</button></a>
        <a href="{{ route('course') }}"><button class="btn">Buildings</button></a>
        <a href="{{ route('department') }}"><button class="btn">Departments</button></a>
        <br>
        <div class="button-container-red">
            <button class="btn">Log Out</button>
        </div>
    </div>
</div>
@endsection
