@extends('layout')
@include('navbar_professor')
@section('content')

<div class="rec_dashboard">
    <h1 class="createroomLbl">Edit Activity</h1>

    <div class="rec_dashboard12" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">

        <form class="cRoomsForm" action="{{ route('activities.update', $activity->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="RnamelBl">Activity Name:</label>
                <input type="text" class="Nrooms_txt" id="name" name="name" value="{{ $activity->name }}" required>
            </div>

            <div class="mb-3">
                <label for="score" class="RnamelBl">Score:</label>
                <input type="number" step="0.01" class="Nrooms_txt" id="score" name="score" value="{{ $activity->score }}" required>
            </div>

            <div class="mb-3">
                <label for="max_score" class="RnamelBl">Max Score:</label>
                <input type="number" step="0.01" class="Nrooms_txt" id="max_score" name="max_score" value="{{ $activity->max_score }}" required>
            </div>

            <div class="mb-3">
                <label for="subject_id" class="RnamelBl">Subject:</label>
                <select class="Nrooms_txt" id="subject_id" name="subject_id" required>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ $activity->subject_id == $subject->id ? 'selected' : '' }}>
                            {{ $subject->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="student_id" class="RnamelBl">Student:</label>
                <select class="searchable-dropdown Nrooms_txt" id="student_id" name="student_id" required>
                    <option value="{{ $activity->student_id }}" selected>{{ $activity->student->name ?? 'N/A' }}</option>
                </select>
            </div>

            <div class="button-container-act">
                <button type="submit" class="btn btn-success">Save Changes</button>
                <a href="{{ route('activities.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>

    </div>
</div>

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
