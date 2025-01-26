@extends('layout')
@include('navbar_professor')
@section('content')

<div class="rec_dashboard">
    <h1 class="createroomLbl">Schedule</h1>
    <div class="rec_dashboard3" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
        <table class="rooms-table" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th scope="col">Course</th>
                    <th scope="col">Year Level</th>
                    <th scope="col">Block</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Days & Time</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($schedules as $schedule)
            <tr>
                <td>{{ $schedule->course->name }}</td>
                <td>{{ $schedule->year_level }}</td>
                <td>{{ $schedule->block }}</td>
                <td>{{ $schedule->subject->name }}</td>
                <td>
                            {{ implode(', ', explode(',', $schedule->days)) }} <br>
                            {{ date('h:i A', strtotime($schedule->start_time)) }} - {{ date('h:i A', strtotime($schedule->end_time)) }}
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="3">No schedules available for your profile.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
