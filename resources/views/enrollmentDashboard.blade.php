@extends('layoutenrollmentDashboard')

@section('enrollmentDashboard')
<div class="glass">
        <img src="../images/wupLogo.png" alt="meh" class="dashboardLogo">
    <div class="button-container">
        <a href="{{ route('enrollment') }}"><button class="btn">Enroll Students</button></a>
        <a href="{{ route('enrollmentTable') }}"><button class="btn">View Students</button></a>
        <br>
        <div class="button-container-red">
            <a href="{{ route('registrar') }}"><button class="btn">Return To Dashboard</button></a>
        </div>
    </div>
</div>
@endsection
