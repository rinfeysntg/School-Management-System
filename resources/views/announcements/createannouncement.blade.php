@extends('announcements.createannouncementlayout')

@section('announcements.createannouncement')
    <div class="full announcement-content">
        <h1>Create Announcement</h1>

        <form class="announcement-content" action="{{ route('announcement.store') }}" method="POST">
            @csrf

            <!-- Row for Title and Date -->
            <div class="d-flex flex-row mb-3">
                <!-- Title -->
                <div class="input-group mb-3 flex-grow-1">
                    <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                    <input 
                        name="title" 
                        required 
                        type="text" 
                        class="form-control" 
                        aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>

                <!-- Date -->
                <div class="input-group mb-3 flex-grow-1">
                    <span class="input-group-text" id="inputGroup-sizing-default">Date</span>
                    <input 
                        name="date" 
                        required 
                        type="date" 
                        class="form-control" 
                        aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>
            </div>

            <!-- Row for Target Type and Target -->
            <div class="d-flex flex-row mb-3">
                <!-- Target Type -->
                <div class="d-flex flex-column w-50">
                    <label for="target_type" class="form-label">Target Type:</label>
                    <select id="target_type" name="target_type" class="form-select" required>
                        <option value="department">Department</option>
                        <option value="course">Course</option>
                        <option value="subject">Subject</option>
                        <option value="event">Event</option>
                        <option value="student">Student</option>
                    </select>
                </div>

                <!-- Target -->
                <div class="d-flex flex-column w-50">
                    <label for="target_id" class="form-label">Target:</label>
                    <select id="target_id" name="announcements_target_id" class="searchable-dropdown form-select" required>
                        <!-- Options dynamically loaded -->
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
                        id="floatingTextarea2"></textarea>
                    <label for="floatingTextarea2">Announcement Message</label>
                </div>
            </div>

            <!-- Create Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Create</button>
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
                                search: params.term, // Search query
                                type: $('#target_type').val(), // Target type
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

                // Clear and reload dropdown when target type changes
                $('#target_type').on('change', function () {
                    $('#target_id').val(null).trigger('change');
                });
            });
        </script>
    </div>
@endsection
