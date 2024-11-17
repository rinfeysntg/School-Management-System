
@extends('layout')
@include('registrar.navbar_registrar')
@section('content')
    <div class="container">

    
        <h1>{{ $curriculum->name }}</h1>

        <h3>Curriculum Code: {{ $curriculum->code }}</h3>
        <h4>Program Head: {{ $curriculum->program_head }}</h4>
        <h5>Course ID: {{ $curriculum->course_id }}</h5>

        <div class="container">
    <table class="table table-hover table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">Subject Name</th>
                <th scope="col">Description</th>
                <th scope="col">Subject Code</th>
                <th scope="col">ID</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <h2>Subjects</h2>
            @forelse($curriculum->subjects as $subject)
            <tr>
                    <td>{{ $subject->name }}</td>
                    <td class="text-truncate" style="max-width: 200px;">{{ $subject->description }}</td>
                    <td>{{ $subject->code }}</td>
                    <td>{{ $subject->id }}</td>
                    <td>
                        <a href="{{ route('subjects_edit', $subject->id) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('subjects_destroy', $subject->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No subjects found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
        <div>
        <a href="{{ route('create_subject') }}" class="btn btn-secondary btn-create">Add Subject</a>
    </div>
@endsection
