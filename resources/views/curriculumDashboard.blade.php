@extends('layoutcurriculumDashboard')

@section('CurriculumDashboard')
<div class="glass">
        <img src="../images/wupLogo.png" alt="meh" class="dashboardLogo">
    <div class="button-container">
        <a href="{{ route('curriculum') }}"><button class="btn">Create Curriculum</button></a>
        <a href="{{ route('curriculumTable') }}"><button class="btn">View Curriculum</button></a>
        <br>
        <div class="button-container-red">
            <a href="{{ route('registrar') }}"><button class="btn">Return To Dashboard</button></a>
        </div>
    </div>
</div>
@endsection
