@extends('layoutenrollmentTable')

@section('enrollmentTable')
<div class="glass">
    <h1 class="heading">Enrolled Students</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('enrollmentTable') }}" class="mb-3">
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

    <!-- Pagination Links -->
    {{ $enrollments->links() }}

    <div class="button-container">
        <a href="{{ route('enrollmentTableNot') }}"><button class="btn">View Not Enrolled</button></a>
    </div>
    <div class="button-container">
        <a href="{{ route('enrollDashboard') }}"><button class="btn">Return</button></a>
    </div>
</div>
@endsection
