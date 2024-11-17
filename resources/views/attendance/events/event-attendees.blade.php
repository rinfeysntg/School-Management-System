<h1>Attendees for Event: {{ $event->name }}</h1>

<table>
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Time Attended</th>
        </tr>
    </thead>
    <tbody>
        @foreach($event->attendees as $attendance)
            <tr>
                <td>{{ $attendance->student_id }}</td>
                <td>{{ $attendance->student->name }}</td>
                <td>{{ $attendance->attended_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

