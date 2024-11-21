<!-- resources/views/announcements/fullannouncement.blade.php -->
@extends('announcements.announcementlayout')

@section('announcements.announcementdashboard')
    <div class="announcement-content">
        <h1>{{ $announcement->title }}</h1>
        <p><strong>Target ID: </strong>{{ $announcement->announcement_target_id }}</p>
        <p>{{ $announcement->message }}</p>  <!-- Show the full message -->
    </div>
@endsection
