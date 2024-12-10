@extends('layoutregistrar')

@section('registrardashboard')
<div class="glass">
        <img src="../images/wupLogo.png" alt="meh" class="dashboardLogo">
        <div class="button-container">
        <a href="{{ route('announcements.announcement') }}"><button class="btn">Announcements</button></a>
        <a href="{{ route('students_index') }}"><button class="btn">Students</button></a>
        <a href="{{ route('curriculums_program_head') }}"><button class="btn">Schedule</button></a>
        <a href="{{ route('curriculums_program_head') }}"><button class="btn">Events</button></a>
        <br>
        <div class="button-container-red">
        <a href="{{ route('logout') }}"><button class="btn">Log Out</button></a>
        </div>
    </div>
</div>
@endsection
