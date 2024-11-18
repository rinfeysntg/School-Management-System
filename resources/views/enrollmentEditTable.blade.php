@extends('layoutenrollmentEditTable')

@section('enrollmentEditDashboard')
<div class="glass">
    <h1 class="heading">Edit Enrollment</h1>
    <div class="frame">
        <form action="{{ route('enrollment.update', $enrollment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <h4>
                <label for="name" class="form-label">Student:</label>
                <input type="text" name="name" value="{{ $enrollment->user->name }}"readonly>
                </h4>
            </div>
            <br>
            <div class="mb-3">
                <h4>
                <label for="status" class="form-label">Status:</label>
                <select name="status" required>
                    <option value="Enrolled" {{ $enrollment->status == 'Enrolled' ? 'selected' : '' }}>Enrolled</option>
                    <option value="Not Enrolled" {{ $enrollment->status == 'Not Enrolled' ? 'selected' : '' }}>Not Enrolled</option>
                </select>
                </h4>
            </div>
            <br>
            <div class="button-container">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
        <br>
        <div class="button-container">
            <a href="{{ route('enrollmentTable') }}"><button class="btn btn-secondary">Return</button></a>
        </div>
    </div>
</div>

@endsection
