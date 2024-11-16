@extends('layoutregistrar')

@section('registrardashboard')
<div class="glass">
        <img src="../images/wupLogo.png" alt="meh" class="dashboardLogo">
    <div class="button-container">
        <button class="btn">Announcements</button>
        <a href="{{ route('courseDashboard') }}"><button class="btn">Courses</button></a>
        <a href="{{ route('curriculumDashboard') }}"><button class="btn">Curriculums</button></a>
        <a href="{{ route('course') }}"><button class="btn">Buildings</button></a>
        <a href="{{ route('departmentDashboard') }}"><button class="btn">Departments</button></a>
        <br>
        <div class="button-container-red">
            <a href="{{ route('/') }}"><button class="btn">Log Out</button></a>
        </div>
    </div>
</div>
@endsection
