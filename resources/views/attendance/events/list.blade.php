@extends('attendance.events.app') <!-- Updated layout file path -->

@section('content')
    <div class="container">
        <h1 class="my-4">List of Events</h1>
        
        @if($events->isEmpty())
            <div class="alert alert-info">
                No events found. <a href="{{ route('attendance.events.create') }}" class="alert-link">Create an event</a> to get started!
            </div>
        @else
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Event Name</th>
                        <th>Event Date</th>
                        <th>Event Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->event_date ? $event->event_date->format('F j, Y') : 'Not Set' }}</td>
                            <td>{{ $event->event_time ? $event->event_time->format('H:i') : 'Not Set' }}</td>
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

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{ $events->links() }}
            </div>
        @endif
    </div>
@endsection
