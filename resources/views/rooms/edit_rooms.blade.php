@extends('layout')
@include('registrar.navbar_registrar')
@section('content')
<div class="rec_dashboard">
    <h1 class="createroomLbl">Edit Room</h1> 

    <div class="rec_dashboard2">

        <form class="cRoomsForm" action="{{ route('rooms.update', $room->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="RnamelBl">Name:</label>
                <input type="text" class="Nrooms_txt" id="name" name="name" value="{{ old('name', $room->name) }}" required>
                @if($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="building_id" class="RbuildingLbl">Building:</label>
                <select id="dropdown" name="building_id" required>
                    <option value="">Select a building</option>
                    @foreach ($buildings as $building)
                        <option value="{{ $building->id }}">{{ $building->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="RdescLbl">Description:</label>
                <textarea class="rooms_desc" id="description" name="description">{{ old('description', $room->description) }}</textarea>
            </div>

            <div class="button-container">
                <button type="submit" class="createRoomBtn">Update</button> 
        </form>

    </div>
</div>
@endsection
