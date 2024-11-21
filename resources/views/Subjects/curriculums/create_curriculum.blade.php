@extends('layout')
@include('registrar.navbar_registrar')
@section('content')
<div class="rec_dashboard">
    
        <h1 class="createroomLbl">Create a New Curriculum</h1>
        <div class="rec_dashboard2">
        <form action="{{ route('curriculums_store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Curriculum Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="code">Curriculum Code</label>
                <input type="text" class="form-control" id="code" name="code" required>
            </div>

            <div class="form-group">
                <label for="user_id">Program Head</label>
                <select name="user_id" id="user_id" class="form-control">
                    <option value="">Select a program head</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}"> {{ $user->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="course_id">Select Course</label>
                <select name="course_id" id="course_id" class="form-control">
                    <option value="">Select a course</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}"> {{ $course->name }} </option>
                    @endforeach
                </select>
            </div>
            </div>
            <br>
            <button type="submit" class="add-sub">Create Curriculum</button>
        </form>
    </div>
@endsection
