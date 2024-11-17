@extends('layoutbuilding')

@section('buildingdashboard')
<div class="glass">
    <h1 class="heading">Create Building</h1>
    <div class="frame">

        <h4>Name: <input ></h4>
        <br>
        <h4>Description: <input></h4>
        <br>
    </div>
    <br>
    <div class="button-container">
    <button type="button" class="btn">Create</button>
    <a href="{{ route('buildingDashboard') }}"><button class="btn">Return</button></a>
    </div>
</div>
@endsection
