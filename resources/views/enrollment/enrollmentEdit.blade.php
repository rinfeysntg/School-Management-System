@extends('layoutenrollmentEdit')

@section('enrollmentEdit')
<div class="glass">
    <h1 class="heading">Update Student Enrollment</h1>
    <div class="frame">
        <form id="updateStudentForm" action="{{ route('enrollment.update', $enrollment->id) }}" method="POST" onsubmit="return confirmUpdate()">
            @csrf
            @method('PUT')
            <h4>Student: 
                <select id="dropdown" name="user_id" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $enrollment->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </h4>
            <br>
            <h4>Status: 
                <select id="dropdown" name="status" required>
                    <option value="NotEnrolled" {{ $enrollment->status == 'NotEnrolled' ? 'selected' : '' }}>Not Enrolled</option>
                    <option value="Enrolled" {{ $enrollment->status == 'Enrolled' ? 'selected' : '' }}>Enrolled</option>
                </select>
            </h4>            
            <br>
            <div class="button-container">
                <button type="submit" class="btn" id="updateButton">Update</button>
            </div>
        </form>
        <br>
        <div class="button-container">
            <a href="{{ route('enrollDashboard') }}"><button class="btn">Return</button></a>
        </div>
    </div>
</div>

<script>
    function confirmUpdate() {
        if (confirm('Update Enrollment Status?')) {
            setTimeout(() => {
                alert('Enrollment Status Updated');
            }, 100);
            return true;
        }
        return false;
    }
</script>
@endsection
