@extends('layoutcurriculum')

@section('curriculumdashboard')
<div class="glass">
    <h1 class="heading">Create Curriculum</h1>
    <div class="frame">
        <h4>Code: <input></h4>
        <br>
        <h4>Name: <input ></h4>
        <br>
        <h4>Course ID: 
            <select id="dropdown">
                <option value="option1">CECT</option>
                <option value="option2">CBA</option>
                <option value="option3">CAS</option>
            </select>
        </h4>
    </div>
    <br>
    <div class="button-container">
    <button type="button" class="btn">Create</button>
    <a href="{{ route('curriculumDashboard') }}"><button class="btn">Return</button></a>
    </div>
</div>
@endsection