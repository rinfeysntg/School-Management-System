@extends('announcements.announcementlayout')
@section('announcements.announcementdashboard')
    <div class="full announcement-content">
        <h1>Announcements</h1>

        <div class="flex-grow announcement-container fullwidth" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
            @foreach ($announcements as $announcement)
                <div class="announcement-item">
                    <div class="flex-row">
                        <h3 class="flex-grow">{{ $announcement->title }}</h3>
                        <p>{{ $announcement->date }}</p>
                        <p class="target-Id"><strong>To: </strong>
                            @if ($announcement->target)
                                {{ $announcement->target->name }}
                            @else
                                None
                            @endif
                        </p>
                    </div>
                    <p>{{ $announcement->message }}</p>

                    <div class="button-group" style="display: flex; gap: 10px; align-items: center; justify-content: flex-end;">
                        <a href="{{ route('announcements.show', $announcement->id) }}" class="btn btn-info view-button">View</a>
                        <a href="{{ route('announcement.edit', $announcement->id) }}" class="btn btn-primary edit-button">Edit</a>
                        <form action="{{ route('announcement.destroy', $announcement->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this announcement?');" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="createbtn-container">
            <a href="{{ route('announcement.create') }}" class="create-btn">Create New Announcement</a>
        </div>
    </div>
@endsection
