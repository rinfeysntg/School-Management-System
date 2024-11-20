@extends('layout')
@include('registrar.navbar_registrar')

@section('content')
    <title>Curriculums List</title>
    <div class="sel-crs">
    <form class="how" action="{{ route('curriculums_index') }}" method="GET">
        <label for="course_id">Course:</label>
        <select name="course_id" id="course_id" onchange="this.form.submit()">
            <option value="">courses</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
    </form>
    </div>
    <div class="sub_dashboard">
    
    <h1 class="createroomLbl">Curriculums</h1>
    <div class="rec_dashboard3">
        <table class="rooms-table">
            <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Program Head</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="subject-table">
                @foreach($curriculums as $curriculum)
                    <tr>
                        <td>{{ $curriculum->code }}</td>
                        <td>{{ $curriculum->name }}</td>
                        <td>{{ $curriculum->program_head }}</td>
                        <td>
                            <a href="{{ route('curriculums_show', $curriculum->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('curriculums_edit', $curriculum->id) }}" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('curriculums_destroy', $curriculum->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <div class="button-container">
            <a href="{{ route('curriculums_create') }}" class="add-sub">Create New Curriculum</a>
        </div>
    
    </div>
@endsection
