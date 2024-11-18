@extends('layoutenrollment')

@section('enrollmentdashboard')
<div class="glass">
    <h1 class="heading">Edit Enrollment</h1>
    <div class="frame">
        <form action="{{ route('enrollment.update', $enrollment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h4>Student: 
                <input type="text" value="{{ $enrollment->user->name }}" readonly>
            </h4>
            <br>
            <h4>Status: 
                <select name="status" required>
                    <option value="Enrolled" {{ $enrollment->status == 'Enrolled' ? 'selected' : '' }}>Enrolled</option>
                    <option value="Not Enrolled" {{ $enrollment->status == 'Not Enrolled' ? 'selected' : '' }}>Not Enrolled</option>
                </select>
            </h4>
            <br>
            <div class="button-container">
                <button type="submit" class="btn">Update Enrollment</button>
            </div>
        </form>
        <br>
        <div class="button-container">
            <a href="{{ route('enrollmentTable') }}"><button class="btn">Return</button></a>
        </div>
    </div>
</div>
@endsection
