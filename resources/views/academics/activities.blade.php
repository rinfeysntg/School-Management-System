@extends('layout')

@include('navbar_professor')

@section('content')

<div class="rec_dashboard">
    <h1 class="createroomLbl">All Activities</h1>
    <div class="button-container-group">
        <a href="{{ route('students.show') }}" class="createRoomBtn3">Student List</a>
        <a href="{{ route('grade_percentages.index') }}" class="createRoomBtn3">Grade Breakdown</a>
    </div>
    <div class="rec_dashboard3" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
        <table class="rooms-table">
            <thead>
                <tr>
                    <th scope="col">Activity Name</th>
                    <th scope="col">Score</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Grade Acquired</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($activities as $activity)
                    <tr>
                        <td>{{ $activity->name }}</td>
                        <td>{{ $activity->score }}/{{ $activity->max_score }}</td>
                        <td>{{ $activity->subject->name ?? 'N/A' }}</td>
                        <td>{{ $activity->student->name ?? 'N/A' }}</td>
                        <td>{{ $activity->grade }}%</td>
                        <td>
                            <a href="{{ route('activities.edit', $activity->id) }}" class="edit-btn">Edit</a>
                            <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this activity?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No activities found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="button-container">
        <a href="{{ route('activities.create') }}" class="createRoomBtn2">Add Activity</a>
    </div>
</div>

@endsection
