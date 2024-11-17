@extends('announcements.announcementlayout')

@section('announcements.announcementdashboard')
    <div class="full announcement-content">
        <h1>Announcements</h1>


        <div class="flex-grow announcement-container fullwidth">
            <!-- Loop through the announcements and display each one -->
            @foreach ($announcements as $announcement)
                <div class="announcement-item ">
                    <div class="flex-row">
                        <h3 class="flex-grow">{{ $announcement->title }}</h3>
                        <p class="target-Id"><strong>Target ID: </strong>{{ $announcement->announcement_target_id }}</p>
                    </div>
                    <p>{{ $announcement->message }}</p>
                    <form action="{{ route('announcement.destroy', $announcement->id) }}" class="flex-grow marginright" method="POST" onsubmit="return confirm('Are you sure you want to delete this announcement?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-button delete-button:hover">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

        <!-- Create Button -->
        <div class="createbtn-container">
            <a href="{{ route('announcement.create') }}" class="create-btn">Create New Announcement</a>
        </div>

    </div>
@endsection
