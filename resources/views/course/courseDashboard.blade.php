@extends('layoutCourseDashboard')
@section('CourseDashboard')
<div class="glass">
        <img src="../images/wupLogo.png" alt="meh" class="dashboardLogo">
    <div class="button-container">
        <a href="{{ route('course') }}"><button class="btn">Create Course</button></a>
        <a href="{{ route('courseTable') }}"><button class="btn">View Courses</button></a>
        <br>
        <div class="button-container-red">
            <a href="{{ route('registrar') }}"><button class="btn">Return To Dashboard</button></a>
        </div>
    </div>
</div>
@endsection
