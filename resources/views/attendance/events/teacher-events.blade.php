<h1>Your Events</h1>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<a href="{{ route('events.create') }}">Create New Event</a>

<table>
    <thead>
        <tr>
            <th>Event Name</th>
            <th>Event Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->name }}</td>
                <td>{{ $event->event_date }}</td>
                <td>
                    <a href="{{ route('events.attendees', $event->id) }}">View Attendees</a> |
                    <a href="{{ route('events.attendance', $event->id) }}">Log Attendance</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
