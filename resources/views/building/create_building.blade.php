@extends('layout')

@section('content')

<div class="rec_dashboard">
    
    <h1 class="createroomLbl">Create Building</h1>

    <div class="rec_dashboard2">

        <form class="cRoomsForm" action="{{ route('building.store') }}" method="POST">
            @csrf 

            <div class="mb-3">
                <label for="name" class="RnamelBl">Name:</label>
                <input type="text" class="Nrooms_txt" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="RdescLbl">Description:</label>
                <textarea class="rooms_desc" id="description" name="description"></textarea>
            </div>

            <div class="button-container">
                <button type="submit" class="createRoomBtn">Create</button>
            </div>
        </form>

    </div>
    
</div>

@endsection
