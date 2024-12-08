@extends('layouts.app')

@section('title', 'Edit Activity')

@section('content')
    <h1>Edit Activity</h1>
    <form action="{{ route('activities.update', $activity->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Activity Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $activity->name }}" required>
        </div>
        <div class="mb-3">
            <label for="score" class="form-label">Score</label>
            <input type="number" step="0.01" class="form-control" id="score" name="score" value="{{ $activity->score }}" required>
        </div>
        <div class="mb-3">
            <label for="max_score" class="form-label">Max Score</label>
            <input type="number" step="0.01" class="form-control" id="max_score" name="max_score" value="{{ $activity->max_score }}" required>
        </div>
        <div class="mb-3">
            <label for="subject_id" class="form-label">Subject</label>
            <select class="form-control" id="subject_id" name="subject_id" required>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $activity->subject_id == $subject->id ? 'selected' : '' }}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="student_id" class="form-label">Student</label>
            <select class="searchable-dropdown form-control" id="student_id" name="student_id" required>
                <option value="{{ $activity->student_id }}" selected>{{ $activity->student->name ?? 'N/A' }}</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('activities.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

    <script>
        $(document).ready(function () {
            $('#student_id').select2({
                ajax: {
                    url: '{{ route("attendance.searchUsers") }}',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            search: params.term,
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.map(function (item) {
                                return { id: item.id, text: item.name };
                            })
                        };
                    },
                },
                placeholder: 'Search for a student',
                minimumInputLength: 1
            });
        });
    </script>
@endsection
