@extends('announcements.announcementlayout')

@section('announcements.announcementdashboard')
    <div class="full announcement-content">
        <h1>Announcements</h1>

        <div class="flex-grow announcement-container fullwidth">
            @forelse ($announcements as $announcement)
                <div class="announcement-item">
                    <div class="flex-row" style="display: flex; justify-content: space-between;">
                        <h3 class="flex-grow">
                            <a href="{{ route('announcements.show', $announcement->id) }}">
                                {{ $announcement->title }}
                            </a>
                        </h3>
                        <p>{{ $announcement->date }}</p>
                        <p class="target-Id" style="text-align: left; margin-right: 0;"><strong>To: </strong>
                            @if ($announcement->target)
                                {{ $announcement->target->name ?? $announcement->target->title ?? 'General' }}
                            @else
                                None
                            @endif
                        </p>
                    </div>
                    <p>{{ Str::limit($announcement->message, 100, '...') }}</p>
                </div>
                @empty
                <p>No announcements available at the moment.</p>
            @endforelse
        </div>
    </div>
@endsection
