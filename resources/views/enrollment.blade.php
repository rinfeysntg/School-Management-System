@extends('layoutenrollment')

@section('enrollment')
<div class="glass">
    <h1 class="heading">Enroll Students</h1>
    <div class="frame">
        <form id="enrollStudentForm" action="{{ route('enroll.store') }}" method="POST" onsubmit="return confirmCreate()">
            @csrf
            <h4>Student: 
                <select id="dropdown" name="user_id" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </h4>
            <br>
            <h4>Status: 
                <select id="dropdown" name="status" required>
                    <option value="Enrolled">Enrolled</option>
                    <option value="Not Enrolled">Not Enrolled</option>
                </select>
            </h4>            
            <br>
            <div class="button-container">
                <button type="submit" class="btn" id="enrollButton">Enroll</button>
            </div>
        </form>
        <br>
        <div class="button-container">
            <a href="{{ route('enrollmentDashboard') }}"><button class="btn">Return</button></a>
        </div>
    </div>
</div>

<script>
    function confirmCreate() {
        if (confirm('Enroll Student?')) {
            setTimeout(() => {
                alert('Student Enrolled');
            }, 100);
            return true;
        }
        return false;
    }
</script>
@endsection
