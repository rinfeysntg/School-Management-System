@extends('layout')
@include('registrar.navbar_registrar')
@section('content')

<div class="sub_dashboard">
<h1 class="subh1">Edit Curriculum</h1>

<form class="subform1" action="{{ route('curriculums_update', $curriculum->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Curriculum Name:</label>
        <input type="text" class="form-control2" id="name" name="name" value="{{ $curriculum->name }}" required>
    </div>

    <div class="mb-3">
        <label for="code" class="form-label">Curriculum Code:</label>
        <input type="text" class="form-control2" id="code" name="code" value="{{ $curriculum->code }}" required>
    </div>

    <div class="mb-3">
            <label for="user_id" class="form-label">Program Head:</label>
            <select name="user_id" id="user_id" class="form-control2 @error('user_id') is-invalid @enderror" required>
                <option value="">Select a program head</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $curriculum->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
    <label for="program_head" class="form-label">Course ID: {{ $curriculum->course_id }}</label>
    <select name="course_id" id="course_id" required>
        @foreach($courses as $course)
            <option value="{{ $course->id }}" 
                {{ old('course_id', $curriculum->course_id) == $course->id ? 'selected' : '' }}>
                {{ $course->name }}
            </option>
        @endforeach
    </select>
</div>
    </div>
    <button type="submit" class="add-sub">Update</button>
    <a href="{{ route('curriculums_index') }}" class="add-sub">Cancel</a>
</form>

@endsection
