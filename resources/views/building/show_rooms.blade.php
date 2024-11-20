
@extends('layout')
@include('registrar.navbar_registrar')
@section('content')

    <div class="view-container">

    
        <h1>{{ $building->name }}</h1>
    </div>

        <div class="sub_dashboard">
        <div class="rec_dashboard3">
    <table class="rooms-table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Room Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody class="subject-table">
        <h2>Rooms</h2>
            @forelse($building->rooms as $room)
            <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->name }}</td>
                    <td>
                        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No rooms found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
        </div>
        </div>
        <div>
        <a href="{{ route('rooms.create') }}" class="add-sub">Add Room</a>
    </div>
@endsection
