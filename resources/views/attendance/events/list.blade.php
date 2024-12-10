@extends('layout') <!-- Updated layout file path -->

@include('navbar_programhead')

@section('content')

<div class="rec_dashboard">
    <h1 class="createroomLbl">List of Events</h1>

    <!-- Button Container for Add Event -->
    <div class="button-container">
        <a href="{{ route('attendance.events.create') }}" class="createRoomBtn3">Add Event</a>
    </div>

    <br>

    <!-- Events Table -->
    <div class="rec_dashboard13">
        <table class="rooms-table table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Event Time</th>
                    <th>Course</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->event_date ? $event->event_date->format('F j, Y') : 'Not Set' }}</td>
                        <td>{{ $event->event_time ? $event->event_time->format('H:i') : 'Not Set' }}</td>
                        <td><strong>{{ $event->course->name ?? 'N/A' }}</strong><br>
                            <span class="year_level">{{ $event->year_level }} - {{ $event->block }}</span>
                        </td>
                        <td>{{ $event->department->name ?? 'N/A' }}</td>
                        <td>
                            <!-- View Attendees -->
                            <a href="{{ route('attendance.event.attendees', $event->id) }}" class="btn btn-sm btn-primary">View Attendees</a>

                            <!-- Edit Event -->
                            <a href="{{ route('attendance.events.edit', $event->id) }}" class="btn btn-sm btn-secondary">Edit</a>

                            <!-- Delete Event -->
                            <form action="{{ route('attendance.events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $events->links() }}
    </div>
</div>

@endsection
