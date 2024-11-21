
@extends('layout')
@include('navbar_programhead')
@section('content')

    <div class="view-container">

    
        <h1>{{ $curriculum->name }}</h1>

        <h3>Curriculum Code: {{ $curriculum->code }}</h3>
        <h4>Program Head: {{ $curriculum->user->name }}</h4>
        <h5>Course ID: {{ $curriculum->course_id }}</h5>
    </div>

        <div class="sub_dashboard">
        <div class="rec_dashboard3">
    <table class="rooms-table">
        <thead>
            <tr>
                <th scope="col">Subject Code</th>
                <th scope="col">Subject Name</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody class="subject-table">
        <h2>Subjects</h2>
            @forelse($curriculum->subjects as $subject)
            <tr>
                    <td>{{ $subject->code }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->description }}</td>
                    
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No subjects found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
        </div>
        </div>
        <div>
        <a href="{{ route('create_subject') }}" class="add-sub">Create Schedule</a>
    </div>
@endsection
