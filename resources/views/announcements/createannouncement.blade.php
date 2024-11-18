@extends('announcements.createannouncementlayout')

@section('announcements.createannouncement')
    <div class="full announcement-content">

        <h1>Create Announcement</h1>

        <form class="announcement-content" action="{{ route('announcement.store') }}" method="POST">
            @csrf
            <div class="flex-row fullwidth">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                    <input name="title" required type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="targetid">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Target</span>
                        <input name="announcement_target_id" required type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
                </div>
            </div>
            <div class="fullwidth fullheight">
                <div class="form-floating h-100">
                    <textarea name="message" required type="text" class="form-control w-100 h-100" placeholder="Leave a comment here" id="floatingTextarea2"></textarea>
                    <label for="floatingTextarea2">What's on your Mind?</label>
                </div>
            </div>


            <div class="createbtn-container">
                <button type="submit" class="create-btn">Create</button>
            </div>

        </form>
    </div>
@endsection
