@extends('layout')
@include('registrar.navbar_registrar')
@section('content')
    
        <div class="sub_dashboard">
            <h1 class="createroomLbl">Add Subject</h1>
            <div class="rec_dashboard2">
            <form class="cRoomsForm" action="{{ route('store_subject') }}" method="POST">
        @csrf
                <div class="mb-3">
                    <label for="code" class="form-label">Code:</label>
                    <input type="text" id="code" name="code" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea id="description" name="description" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="curriculum_id">Curriculum</label>
                    <select name="curriculum_id" class="form-control" required>
                    <option value="">Select Curriculum</option>
                @foreach($curriculums as $curriculum)
                    <option value="{{ $curriculum->id }}">{{ $curriculum->name }}</option>
                @endforeach
        </select>
    </div>
    </div>
                <button type="submit" class="add-sub">Add</button>
            </form>
        </div>
    </div>
@endsection