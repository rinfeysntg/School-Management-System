@extends('layoutenrollmentTable')

@section('enrollmentTable')
<div class="glass">
    <h1 class="heading">Not Enrolled Students</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('enrollmentTableNot') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by Name" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-success table-striped">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>Not Enrolled</td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
    </div>

    <div class="button-container">
        <a href="{{ route('enrollmentTable') }}"><button class="btn">View Enrolled</button></a>
    </div>
    <div class="button-container">
        <a href="{{ route('enrollDashboard') }}"><button class="btn">Return</button></a>
    </div>
</div>
@endsection
