@extends('layoutenrollment')

@section('enrollmentdashboard')
<div class="glass">
    <h1 class="heading">Enroll Student</h1>
    <div class="frame">
        <h4>Student: <select id="dropdown">
            <option value="option1">Harold</option>
            <option value="option2">Gian</option>
            <option value="option3">Erwin</option>
        </select></h4>
        <br>
        <h4>Department ID: <select id="dropdown">
            <option value="option1">CECT</option>
            <option value="option2">CBA</option>
            <option value="option3">CAS</option>
        </select></h4>
        <br>
        <h4>Course ID: 
            <select id="dropdown">
                <option value="option1">BSIT</option>
                <option value="option2">BSCE</option>
            </select>
        </h4>
    </div>
    <br>
    <div class="button-container">
    <button type="button" class="btn">Enroll</button>
    <a ><button class="btn">Return</button></a>
    </div>
</div>
@endsection
