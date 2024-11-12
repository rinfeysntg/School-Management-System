
@extends('layout')

@section('content')
    <div class="container">
        <h1>{{ $curriculum->name }}</h1>

        <h3>Curriculum Code: {{ $curriculum->code }}</h3>
        <h4>Program Head: {{ $curriculum->program_head }}</h4>
        <h5>Course ID: {{ $curriculum->course_id }}</h5>

        <h2>Subjects</h2>
        <ul>
            @forelse($curriculum->subjects as $subject)
                <li>{{ $subject->name }} ({{ $subject->code }})</li>
            @empty
                <li>No subjects available for this curriculum.</li>
            @endforelse
        </ul>
    </div>
@endsection
