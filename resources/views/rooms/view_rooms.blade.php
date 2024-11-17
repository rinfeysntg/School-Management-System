@extends('layout')

@section('content')

<div class="rec_dashboard">
    <h1 class="createroomLbl">Rooms</h1>

    <div class="rec_dashboard3">
        <table class="rooms-table">
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>
                            <strong>{{ $room->name }}</strong><br>
                            <span class="description">{{ $room->description }}</span>
                        </td>
                        <td>
                            Room ID: {{ $room->id }}<br>
                            Building ID: {{ $room->building_id }}
                        </td>
                        <td>
                            <a href="{{ route('rooms.edit', $room->id) }}" class="edit-btn">Edit</a>
                            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="button-container">
        <a href="{{ route('rooms.create') }}" class="createRoomBtn2">Create Room</a>
    </div>

</div>

@endsection
