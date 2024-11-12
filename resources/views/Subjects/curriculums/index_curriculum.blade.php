@extends('layout')

@section('content')
    <title>Curriculums List</title>

    <h1>Curriculums</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('curriculums_create') }}">Create New Curriculum</a>
<!--                                                                                                para sa course dropdown
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
    </form> -->

    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Program Head</th>
                <th>Actions</th>
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
@endsection
