@extends('layoutregistrar')

@section('registrardashboard')
<div class="glass">
        <img src="../images/wupLogo.png" alt="meh" class="dashboardLogo">
        <div class="button-container">
        <a href="/announcement"><button class="btn">Announcements</button></a>
        <a href="{{ route('enrollDashboard') }}"><button class="btn">Rooms</button></a>
        <a href="{{ route('department.index') }}"><button class="btn">Students</button></a>
        <a href="{{ route('courseDashboard') }}"><button class="btn">Schedule</button></a>
        <br>
        <div class="button-container-red">
        <a href="{{ route('logout') }}"><button class="btn">Log Out</button></a>
        </div>
    </div>
</div>
@endsection
