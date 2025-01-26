@extends('layout')
@include('navbar_student')
@section('content')

<div class="rec_dashboard">
    <h1 class="createroomLbl">Activities</h1>
    <div class="button-container-group">
        <a href="{{ route('student.grades') }}" class="createRoomBtn3">View Final Grades</a>
    </div>
    <div class="rec_dashboard3">
    <div class="table-container" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd;">
        <table class="rooms-table" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th scope="col">Activity Name</th>
                    <th scope="col">Score</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Grade Acquired</th>
                </tr>
            </thead>
            <tbody>
                @forelse($activities as $activity)
                    <tr>
                        <td>{{ $activity->name }}</td>
                        <td>{{ $activity->score }} / {{ $activity->max_score }}</td>
                        <td>{{ $activity->subject->name ?? 'N/A' }}</td>
                        <td>{{ $activity->grade }}%</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No activities found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
</div>

@endsection
