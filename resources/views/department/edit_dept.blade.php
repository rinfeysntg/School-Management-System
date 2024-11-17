@extends('layout')
@include('registrar.navbar_registrar')
@section('content')
<div class="rec_dashboard">
    <h1 class="createroomLbl">Edit Department</h1> 

    <div class="rec_dashboard2">

        <form class="cRoomsForm" action="{{ route('department.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="RnamelBl">Name:</label>
                <input type="text" class="Nrooms_txt" id="name" name="name" value="{{ old('name', $department->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="building_id" class="RbuildingLbl">Building ID:</label>
                <input type="number" class="building_id_txt" id="building_id" name="building_id" value="{{ old('building_id', $department->building_id) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="RdescLbl">Description:</label>
                <textarea class="rooms_desc" id="description" name="description">{{ old('description', $department->description) }}</textarea>
            </div>

            <div class="button-container">
                <button type="submit" class="createRoomBtn">Update</button> 
        </form>

    </div>
</div>
@endsection
