@extends('layoutregistrar')

@section('registrardashboard')
<div class="glass">
        <img src="../images/wupLogo.png" alt="meh" class="dashboardLogo">
        <div class="button-container">
        <a href="{{ route('announcements.announcement') }}"><button class="btn">Announcements</button></a>
        <a href="{{ route('payments.index') }}"><button class="btn">Payments</button></a>
        <a href="{{ route('payrolls') }}"><button class="btn">Payroll</button></a>
        <br>
        <div class="button-container-red">
        <a href="{{ route('logout') }}"><button class="btn">Log Out</button></a>
        </div>
    </div>
</div>
@endsection
