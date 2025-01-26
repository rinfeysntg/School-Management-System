@extends('layout') 
@include('navbar_programhead')
@section('content')

<div class="rec_dashboard">
    <h1 class="createroomLbl">Schedules for {{ $curriculum->name }}</h1>
    <div class="rec_dashboard3">
        <table class="rooms-table">
            <thead>
                <tr>
                    <th scope="col">Course</th>
                    <th scope="col">Year Level</th>
                    <th scope="col">Block</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Professor</th>
                    <th scope="col">Days & Time</th> 
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($curriculum->schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->course->name }}</td>
                        <td>{{ $schedule->year_level }}</td>
                        <td>{{ $schedule->block }}</td>
                        <td>{{ $schedule->subject->name }}</td>
                        <td>{{ $schedule->user->name }}</td>
                        <td>
                            {{ implode(', ', explode(',', $schedule->days)) }} <br>
                            {{ date('h:i A', strtotime($schedule->start_time)) }} - {{ date('h:i A', strtotime($schedule->end_time)) }}
                        </td>
                        <td>
                            <a href="{{ route('schedule.edit', $schedule->id) }}" class="edit-btn">Edit</a>
                            <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this schedule?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No schedules found.</td>
                    </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="button-container">
        <a href="{{ route('schedule.create', ['curriculumId' => $curriculum->id]) }}" class="createRoomBtn2">Create Schedule</a>
        
    </div>
</div>

@endsection
