@extends('announcements.createannouncementlayout')

@section('announcements.createannouncement')
    <div class="full announcement-content">
        <h1>Edit Announcement</h1>

        <form class="announcement-content" action="{{ route('announcement.update', $announcement->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="d-flex flex-row mb-3">
                <div class="input-group mb-3 flex-grow-1">
                    <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                    <input 
                        name="title" 
                        required 
                        type="text" 
                        class="form-control" 
                        value="{{ old('title', $announcement->title) }}" 
                        aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3 flex-grow-1">
                    <span class="input-group-text" id="inputGroup-sizing-default">Date</span>
                    <input 
                        name="date" 
                        required 
                        type="date" 
                        class="form-control" 
                        value="{{ old('date', $announcement->date) }}"
                        aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>
            </div>

            <div class="d-flex flex-row mb-3">
                <div class="d-flex flex-column w-50">
                    <label for="target_type" class="form-label">Target Type:</label>
                    <select id="target_type" name="target_type" class="form-select" required>
                        <option value="department" {{ old('target_type', $announcement->target_type) == 'department' ? 'selected' : '' }}>Department</option>
                        <option value="course" {{ old('target_type', $announcement->target_type) == 'course' ? 'selected' : '' }}>Course</option>
                        <option value="subject" {{ old('target_type', $announcement->target_type) == 'subject' ? 'selected' : '' }}>Subject</option>
                        <option value="event" {{ old('target_type', $announcement->target_type) == 'event' ? 'selected' : '' }}>Event</option>
                        <option value="student" {{ old('target_type', $announcement->target_type) == 'student' ? 'selected' : '' }}>Student</option>
                    </select>
                </div>

                <div class="d-flex flex-column w-50">
                    <label for="target_id" class="form-label">Target:</label>
                    <select id="target_id" name="target_id" class="searchable-dropdown form-select" required>
                        @if($announcement->target)
                            <option value="{{ $announcement->target->id }}" selected>{{ $announcement->target->name }}</option>
                        @endif
                    </select>
                </div>
            </div>

            <!-- Message -->
            <div class="fullwidth fullheight mb-4">
                <div class="form-floating h-100">
                    <textarea 
                        name="message" 
                        required 
                        class="form-control w-100 h-100" 
                        placeholder="Leave your announcement here" 
                        id="floatingTextarea2">{{ old('message', $announcement->message) }}</textarea>
                    <label for="floatingTextarea2">Announcement Message</label>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

        <script>
            $(document).ready(function () {
                $('#target_id').select2({
                    ajax: {
                        url: '{{ route("search.targets") }}',
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                search: params.term, 
                                type: $('#target_type').val(), 
                            };
                        },
                        processResults: function (data) {
                            return {
                                results: data.map(function (item) {
                                    return { id: item.id, text: item.name };
                                }),
                            };
                        },
                    },
                    placeholder: 'Search for a target',
                    minimumInputLength: 1,
                });

                $('#target_type').on('change', function () {
                    $('#target_id').val(null).trigger('change');
                });
            });
        </script>
    </div>
@endsection
