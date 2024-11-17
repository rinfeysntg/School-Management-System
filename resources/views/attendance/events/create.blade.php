<!-- resources/views/attendance/events/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create New Event</h2>

        <form action="{{ route('attendance.events.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="event_name">Event Name</label>
                <input type="text" class="form-control" id="event_name" name="event_name" required>
            </div>

            <div class="form-group">
                <label for="event_date">Event Date</label>
                <input type="date" class="form-control" id="event_date" name="event_date" required>
            </div>

            <div class="form-group">
                <label for="event_time">Event Time</label>
                <input type="time" class="form-control" id="event_time" name="event_time" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Event</button>
        </form>
    </div>
@endsection
