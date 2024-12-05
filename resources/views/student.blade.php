@extends('layoutregistrar')

@section('registrardashboard')
<div class="glass">
        <img src="../images/wupLogo.png" alt="meh" class="dashboardLogo">
        <div class="button-container">
        <a href="{{ route('student.profile') }}"><button class="btn">Profile</button></a>
        <a href="{{ route('department.index') }}"><button class="btn">Announcements</button></a>
        <a href="{{ route('courseDashboard') }}"><button class="btn">Academics</button></a>
        <a href="{{ route('curriculums_index') }}"><button class="btn">Schedule</button></a>
        <a href="{{ route('building.index') }}"><button class="btn">Attendance</button></a>
        <a href="{{ route('enrollment_dashboard') }}"><button class="btn">Enrollment</button></a>
        <br>
        <div class="button-container-red">
        <a href="{{ route('logout') }}"><button class="btn">Log Out</button></a>
        </div>
    </div>
</div>
@endsection
