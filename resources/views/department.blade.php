@extends('layoutdepartment')

@section('departmentdashboard')
<div class="glass">
    <h1 class="heading">Create Departmments</h1>
    <div class="frame">
        <div class="button-container">
                <h4>Name:  <input></h4>
                <br>
                <h4>Description:  <input class="description"></h4>
                <br>
                <h4>Building: <select id="dropdown">
                    <option value="option1">CECT</option>
                    <option value="option2">CBA</option>
                    <option value="option3">CAS</option></h4>
        </div>
    </div>
</div>
@endsection
