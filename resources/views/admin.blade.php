@extends('layoutregistrar')

@section('registrardashboard')
<div class="glass">
        <img src="../images/wupLogo.png" alt="meh" class="dashboardLogo">
        <div class="button-container">
        <a href="{{ route('usersController') }}"><button class="btn">Users</button></a>
        <a href="{{ route('rolesController') }}"><button class="btn">Roles</button></a>
        <a href="{{ route('positionsController') }}"><button class="btn">Positions</button></a>
        <br>
        <div class="button-container-red">
        <a href="{{ route('logout') }}"><button class="btn">Log Out</button></a>
        </div>
    </div>
</div>
@endsection
