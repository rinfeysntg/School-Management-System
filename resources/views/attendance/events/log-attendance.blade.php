<!-- resources/views/attendance/events/show.blade.php -->

@extends('layout')

@section('content')
<div class="container">
    <h1>{{ $event->name }}</h1>
    <p><strong>Date:</strong> {{ $event->event_date }}</p>
    
    @if(auth()->user()->role === 'student')
        <form action="{{ route('attendance.event.attend', $event->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="attended_at">Attendance Time</label>
                <input type="datetime-local" class="form-control" id="attended_at" name="attended_at" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Mark Attendance</button>
        </form>
    @endif
</div>
@endsection
