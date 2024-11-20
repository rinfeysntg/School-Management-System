@extends('layout')
@include('registrar.navbar_registrar')
@section('content')


<div class="rec_dashboard">
    <h1 class="createroomLbl">Schedules</h1>
    <div class="rec_dashboard3">
        <table class="rooms-table">
        <thead>
                <tr>
                    <th scope="col">Course</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Professor</th>
                    <th scope="col">Days & Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr>
                        <td><strong>{{ $schedule->course->name }}</strong><br>
                        <span class="description">{{ $schedule->year_level }}</span></td>
                        <td>{{ $schedule->subject->name }}</td>
                        <td>{{ $schedule->employee->name }}</td>
                        <td>{{ $schedule->days_time }}</td>
                        <td>
                            <a href="{{ route('schedule.edit', $schedule->id) }}" class="edit-btn">Edit</a>
                            <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this schedule?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="button-container">
        <a href="{{ route('schedule.create') }}" class="createRoomBtn2">Create Schedule</a>
    </div>

</div>

@endsection
