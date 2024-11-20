@extends('announcements.announcementlayout')
@include('student.navbar_student')
@section('announcements.announcementdashboard')
    <div class="full announcement-content">
        <h1>Announcements</h1>

        <div class="flex-grow announcement-container fullwidth">
            <!-- Loop through the announcements and display each one -->
            @foreach ($announcements as $announcement)
                <div class="announcement-item">
                    <div class="flex-row" style="display: flex; justify-content: space-between;">
                        <!-- Make the title clickable, redirecting to the full announcement page -->
                        <h3 class="flex-grow">
                            <a href="{{ route('announcements.show', $announcement->id) }}">
                                {{ $announcement->title }}
                            </a>
                        </h3>
                        <p class="target-Id" style="text-align: left; margin-right: 0;"><strong>Target ID: </strong>{{ $announcement->announcement_target_id }}</p>
                    </div>
                    <!-- Clip the message text and show ellipsis -->
                    <p>{{ Str::limit($announcement->message, 100, '...') }}</p> <!-- Limit message to 100 chars -->
                </div>
            @endforeach
        </div>
    </div>
@endsection
