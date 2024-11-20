@extends('layoutenrollmentTable')

@section('enrollmentTable')
<div class="glass">
    <h1 class="heading">Enrolled Students</h1>
    <div class="table-responsive">
        <table class="table table-success table-striped">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->id }}</td>
                        <td>{{ $enrollment->user->name }}</td>
                        <td>{{ $enrollment->status }}</td>
                        <td>
                            <a href="{{ route('enrollment.edit', $enrollment->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
    </div>

    <div class="button-container">
        <a href="{{ route('enrollmentTableNot') }}"><button class="btn">View Not Enrolled</button></a>
    </div>
    <div class="button-container">
        <a href="{{ route('enrollDashboard') }}"><button class="btn">Return</button></a>
    </div>
</div>
@endsection
