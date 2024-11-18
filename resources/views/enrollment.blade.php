@extends('layoutenrollment')

@section('enrollment')
<div class="glass">
    <h1 class="heading">Enroll Student</h1>
    <div class="frame">
        <h4>Student: <select id="dropdown">
            <option value="option1">Harold</option>
            <option value="option2">Gian</option>
            <option value="option3">Erwin</option>
            <option value="option3">Reaver</option>
            <option value="option3">Marko</option>
        </select></h4>
        <br>
        <h4>Status: <select id="dropdown">
            <option value="option1">Not Enrolled</option>
            <option value="option2">Enrolled</option>
        </select></h4>
        <br>
    </div>
    <br>
    <div class="button-container">
    <button type="button" class="btn">Enroll</button>
    <a href="{{ route('enrollmentDashboard') }}"><button class="btn">Return</button></a>
    </div>
</div>
@endsection
