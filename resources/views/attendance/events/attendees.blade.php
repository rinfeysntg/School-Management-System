@extends('layout')
@include('navbar_programhead')

@section('content')
<div class="rec_dashboard">
    <h1 class="createroomLbl">Attendees for Event: {{ $event->name }}</h1>

    <button onclick="window.location='{{ route('attendance.events.list') }}'" id="backBtn" class="btn btn-secondary back-btn">Back to Events</button>

    <!-- No Attendees Found Message -->
    @if($attendees->isEmpty())
        <div class="alert alert-info">
            No attendees found for this event.
        </div>
    @else
        <!-- Attendees Table -->
        <div class="rec_dashboard3">
            <table class="rooms-table table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Course</th>
                        <th>Year Level</th>
                        <th>Block</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendees as $attendee)
                        <tr>
                            <td>{{ $attendee->name }}</td>
                            <td>{{ $attendee->department->name }}</td>
                            <td>{{ $attendee->course->name }}</td>
                            <td>{{ $attendee->year_level }}</td>
                            <td>{{ $attendee->block }}</td>
                            <td>
                                @php
                                    $attendance = $attendee->events->where('pivot.event_id', $event->id)->first();
                                @endphp

                                @if($attendance && $attendance->pivot->status === 'attended')
                                    <span class="text-success">Marked as Attended</span>
                                @elseif($attendance && $attendance->pivot->status === 'absent')
                                    <span class="text-danger">Marked as Absent</span>
                                @else
                                    <!-- Mark Attendance Forms -->
                                    <form action="{{ route('attendance.event.mark', ['eventId' => $event->id, 'userId' => $attendee->id]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        <input type="hidden" name="status" value="attended">
                                        <button type="submit" class="btn btn-sm btn-success">Mark as Attended</button>
                                    </form>
                                    <form action="{{ route('attendance.event.mark', ['eventId' => $event->id, 'userId' => $attendee->id]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        <input type="hidden" name="status" value="absent">
                                        <button type="submit" class="btn btn-sm btn-danger">Mark as Absent</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection

@section('styles')
    <style>
        .back-btn {
            background-color: #555;
            border: none;
            color: white;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            margin-top: 20px;
        }

        .back-btn:hover {
            background-color: #444;
        }
    </style>
@endsection
