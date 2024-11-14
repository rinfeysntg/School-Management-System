@extends('layout')

@section('content')

<h1>Edit Subject</h1>

<form action="{{ route('subjects_update', $subject->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Subject Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $subject->name }}" required>
    </div>

    <div class="mb-3">
        <label for="code" class="form-label">Subject Code</label>
        <input type="text" class="form-control" id="code" name="code" value="{{ $subject->code }}" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="4">{{ $subject->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('subjects') }}" class="btn btn-secondary">Cancel</a>
</form>

@endsection
