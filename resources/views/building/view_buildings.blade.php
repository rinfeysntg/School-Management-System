@extends('layout')

@section('content')

<div class="rec_dashboard">
    <h1 class="createroomLbl">Buildings</h1>

    <div class="rec_dashboard3">
        <table class="rooms-table">
            <tbody>
                @foreach ($buildings as $building)
                    <tr>
                        <td>
                            <strong>{{ $building->name }}</strong><br>
                            <span class="description">{{ $building->description }}</span>
                        </td>
                        <td>
                            Building ID: {{ $building->id }}<br>
                        </td>
                        <td>
                            <a href="{{ route('building.edit', $building->id) }}" class="edit-btn">Edit</a>
                            <form action="{{ route('building.destroy', $building->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this building?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="button-container">
        <a href="{{ route('building.create') }}" class="createRoomBtn2">Create Building</a>
    </div>

</div>

@endsection
