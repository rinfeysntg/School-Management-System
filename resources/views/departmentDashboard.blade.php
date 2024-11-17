@extends('layoutdepartmentDashboard')

@section('DepartmentDashboard')
<div class="glass">
        <img src="../images/wupLogo.png" alt="meh" class="dashboardLogo">
    <div class="button-container">
        <a href="{{ route('department') }}"><button class="btn">Create Department</button></a>
        <a href="{{ route('departmentTable') }}"><button class="btn">View Department</button></a>
        <br>
        <div class="button-container-red">
            <a href="{{ route('registrar') }}"><button class="btn">Return To Dashboard</button></a>
        </div>
    </div>
</div>
@endsection
