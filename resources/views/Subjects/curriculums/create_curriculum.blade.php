@extends('layout')
@include('registrar.navbar_registrar')
@section('content')
<div class="sub_dashboard">
    
        <h1 class="subh1">Create a New Curriculum</h1>
        <form class="subform1" action="{{ route('curriculums_store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Curriculum Name</label>
                <input type="text" class="form-control2" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="code">Curriculum Code</label>
                <input type="text" class="form-control2" id="code" name="code" required>
            </div>

            <div class="form-group">
                <label for="user_id">Program Head</label>
                <select name="user_id" id="user_id" class="form-control2">
                    <option value="">Select a program head</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}"> {{ $user->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="course_id">Select Course</label>
                <select name="course_id" id="course_id" class="form-control2">
                    <option value="">Select a course</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}"> {{ $course->name }} </option>
                    @endforeach
                </select>
            </div>
            </div>
            <br>
            <button type="submit" class="add-curr2">Add Curriculum</button>
        </form>
    </div>
@endsection
