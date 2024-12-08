@extends('announcements.announcementlayout')

@section('announcements.announcementdashboard')
    <div class="announcement-content">
        <br>
        <h1>{{ $announcement->title }}</h1>
        <p>{{ $announcement->date }}</p>
        <p class="target-Id"><strong>To: </strong>
                            @if ($announcement->target)
                                {{ $announcement->target->name }}
                            @else
                                None
                            @endif
                        </p>
        <p>{{ $announcement->message }}</p> 
    </div>
@endsection
