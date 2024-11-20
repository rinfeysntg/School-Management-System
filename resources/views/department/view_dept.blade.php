@extends('layout')
@include('registrar.navbar_registrar')
@section('content')

<div class="sel-crs">
    <form class="how" action="{{ route('department.index') }}" method="GET">
        <label for="building_id">Building:</label>
        <select name="building_id" id="building_id" onchange="this.form.submit()">
            <option value="">buildings</option>
            @foreach($buildings as $building)
                <option value="{{ $building->id }}" {{ request('building_id') == $building->id ? 'selected' : '' }}>
                    {{ $building->name }}
                </option>
            @endforeach
        </select>
    </form>
    </div>
<div class="rec_dashboard">
    <h1 class="createroomLbl">Departments</h1>
    <div class="rec_dashboard3">
        <table class="rooms-table">
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>
                            <strong>{{ $department->name }}</strong><br>
                            <span class="description">{{ $department->description }}</span>
                        </td>
                        <td>
                            Department ID: {{ $department->id }}<br>
                            Building ID: {{ $department->building_id }}
                        </td>
                        <td>
                            <a href="{{ route('department.edit', $department->id) }}" class="edit-btn">Edit</a>
                            <form action="{{ route('department.destroy', $department->id) }}" method="POST" style="display: inline;">
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
        <a href="{{ route('department.create') }}" class="createRoomBtn2">Create Department</a>
    </div>

</div>

@endsection
