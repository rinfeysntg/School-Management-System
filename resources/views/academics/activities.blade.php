@extends('layouts.app')

@section('title', 'All Activities')

@section('content')
    <h1>All Activities</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Activity Name</th>
                <th>Score</th>
                <th>Max Score</th>
                <th>Subject</th>
                <th>Student Name</th>
                <th>Professor Name</th>
                <th>Grade Acquired</th>
            </tr>
        </thead>
        <tbody>
            @forelse($activities as $activity)
                <tr>
                    <td>{{ $activity->name }}</td>
                    <td>{{ $activity->score }}</td>
                    <td>{{ $activity->max_score }}</td>
                    <td>{{ $activity->subject->name ?? 'N/A' }}</td>
                    <td>{{ $activity->student->name ?? 'N/A' }}</td>
                    <td>{{ $activity->professor->name ?? 'N/A' }}</td>
                    <td>{{ $activity->grade }}%</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No activities found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="button-container">
        <a href="{{ route('activities.create') }}" class="btn">Add</a>      
    </div>
@endsection
