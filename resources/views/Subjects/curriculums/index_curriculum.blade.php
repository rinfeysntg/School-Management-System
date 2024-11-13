@extends('layout')

@section('content')
    <title>Curriculums List</title>

    <h1>Curriculums</h1>

    <form action="{{ route('curriculums_index') }}" method="GET">
        <label for="course_id">Select Course:</label>
        <select name="course_id" id="course_id" onchange="this.form.submit()">
            <option value="">Select a course</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
    </form>

    <div class="container">
    <table class="table table-hover table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Program Head</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($curriculums as $curriculum)
                <tr>
                    <td>{{ $curriculum->code }}</td>
                    <td>{{ $curriculum->name }}</td>
                    <td>{{ $curriculum->program_head }}</td>
                    <td>
                        <a href="{{ route('curriculums_show', $curriculum->id) }}">View Curriculum</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center">
        <a href="{{ route('curriculums_create') }}" class="btn btn-secondary">Create New Curriculum</a>
    </div>
    @endsection
