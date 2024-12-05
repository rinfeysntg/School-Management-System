@extends('layout')

@section('content')
    <title>Profile</title>
    <div class="sub_dashboard">
        <h1 class="createroomLbl">My Profile</h1>
        <div class="rec_dashboard3" style="text-align: center;">
        <br>
                <div class="flex-row" style="display: flex; justify-content: center;">    
                    <h3 class="flex-grow">
                        <strong>Name:</strong> {{ $student->name }}
                    </h3>
                </div>
                <p><strong>Username: </strong>{{ $student->username }}</p>
                <p><strong>Email:</strong> {{ $student->email }}</p>
                <p><strong>Password:</strong> {{ $student->password }}</p>
                <p><strong>Department:</strong> {{ $student->department->name ?? 'N/A' }}</p>
                <p><strong>Course:</strong> {{ $student->course->name ?? 'N/A' }}</p>
                <p><strong>Year Level:</strong> {{ $student->year_level }}</p>
                <p><strong>Block:</strong> {{ $student->block }}</p>        
            </div>
     
    </div>
@endsection