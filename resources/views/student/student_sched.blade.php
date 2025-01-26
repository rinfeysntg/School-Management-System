@extends('layout')
@include('navbar_student')

@section('content')

<div class="rec_dashboard">
    <h1 class="createroomLbl">Schedule</h1>
    <div class="rec_dashboard3" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
        <table class="rooms-table" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th scope="col">Subject</th>
                    <th scope="col">Instructor</th>
                    <th scope="col">Days & Time</th>
                    <th scope="col">Building & Room</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($schedules as $schedule)
            <tr>
                <td>{{ $schedule->subject->name }}</td>
                <td>{{ $schedule->user->name }}</td>
                <td>
                            {{ implode(', ', explode(',', $schedule->days)) }} <br>
                            {{ date('h:i A', strtotime($schedule->start_time)) }} - {{ date('h:i A', strtotime($schedule->end_time)) }}
                </td>
                <td>
                        {{ $schedule->building->name ?? 'N/A' }} - {{ $schedule->room->name ?? 'N/A' }}
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
