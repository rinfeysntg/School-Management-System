@extends('layoutenrollment')

@section('enrollment')
<div class="glass">
    <h1 class="heading">Enroll Students</h1>
    <div class="frame">

        @if($user)
            <h4>Student Name:</h4>
            <p id="studentName" class="form-control">
                {{ $user->name }}
            </p>
            <br>
            <h4>Enrollment Status:</h4>
            <p class="form-control">{{ $status }}</p>
        @else
            <p>No matching user found.</p>
        @endif

        <br>

        <div class="button-container">
            <a href="{{ route('student_dashboard') }}"><button class="btn">Return</button></a>
        </div>
    </div>
</div>
@endsection
