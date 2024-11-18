@extends('layoutcourseTable')

@section('courseTabledashboard')
<div class="glass">
<h1 class="heading">Manage Courses</h1>
<div class="table-responsive">
    <table class="table table-success table-striped">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        @foreach ($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->name }}</td>
            <td>{{ $course->description }}</td>
            <td>
                <a href="{{ route('courses.edit', $course->id) }}">Edit</a>
                <br><br>
                <a href="{{ route('courseTable.delete', $course->id) }}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>

<div class="button-container">
    <a href="{{ route('courseDashboard') }}"><button class="btn">Return</button></a>
</div>
</div>
@endsection
