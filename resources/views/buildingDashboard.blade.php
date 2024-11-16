@extends('layoutbuildingDashboard')

@section('BuildingDashboard')
<div class="glass">
        <img src="../images/wupLogo.png" alt="meh" class="dashboardLogo">
    <div class="button-container">
        <a href="{{ route('building') }}"><button class="btn">Create Buildings</button></a>
        <a href="{{ route('buildingTable') }}"><button class="btn">View Buildings</button></a>
        <br>
        <div class="button-container-red">
            <a href="{{ route('registrar') }}"><button class="btn">Return To Dashboard</button></a>
        </div>
    </div>
</div>
@endsection
