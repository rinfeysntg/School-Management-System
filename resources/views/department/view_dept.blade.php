@extends('layout')

@section('content')

<div class="rec_dashboard">
    <h1 class="createroomLbl">Departments</h1>

    <div class="rec_dashboard3">
        <table class="rooms-table">
            <tbody>
                @foreach ($depts as $dept)
                    <tr>
                        <td>
                            <strong>{{ $dept->name }}</strong><br>
                            <span class="description">{{ $dept->description }}</span>
                        </td>
                        <td>
                            Department ID: {{ $dept->id }}<br>
                            Building ID: {{ $dept->building_id }}
                        </td>
                        <td>
                            <a href="{{ route('dept.edit', $dept->id) }}" class="edit-btn">Edit</a>
                            <form action="{{ route('dept.destroy', $dept->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this department?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="button-container">
        <a href="{{ route('dept.create') }}" class="createRoomBtn2">Create Department</a>
    </div>

</div>

@endsection
