@extends('layoutregistrar')

@section('registrardashboard')
<div class="glass">
        <img src="../images/wupLogo.png" alt="meh" class="dashboardLogo">
    <div class="button-container">
        <a href="/announcement"><button class="btn">Announcements</button></a>
        <a href="/departments"><button class="btn">Departments</button></a>
        <a href="{{ route('courseDashboard') }}"><button class="btn">Courses</button></a>
        <a href="/curriculums"><button class="btn">Curriculums</button></a>
        <a href="/subjects"><button class="btn">Subjects</button></a>
        <a href="/buildings"><button class="btn">Buildings</button></a>
        <a href="/rooms"><button class="btn">Rooms</button></a>
        <br>
        <div class="button-container-red">
        <a href="{{ route('logout') }}"><button class="btn">Log Out</button></a>
        </div>
    </div>
</div>
@endsection
