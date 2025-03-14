@extends('layoutregistrar')

@section('registrardashboard')
<div class="glass">
        <img src="../images/wupLogo.png" alt="meh" class="dashboardLogo">
        <div class="button-container">
        <a href="{{ route('announcements.announcement') }}"><button class="btn">Announcements</button></a>
        <a href="{{ route('prof.schedule') }}"><button class="btn">Schedule</button></a>
        <a href="{{ route('activities.index') }}"><button class="btn">Academics</button></a>
        <a href="{{ route('teacher.dashboard') }}"><button class="btn">Attendance</button></a>
        <br>
        <div class="button-container-red">
        <a href="{{ route('logout') }}"><button class="btn">Log Out</button></a>
        </div>
    </div>
</div>
@endsection
