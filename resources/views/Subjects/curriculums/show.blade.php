
@extends('layout')
@include('registrar.navbar_registrar')
@section('content')

    <div class="view-container">

    
        <h1>{{ $curriculum->name }}</h1>

        <h3>Curriculum Code: {{ $curriculum->code }}</h3>
        <h4>Program Head: {{ $curriculum->user->name }}</h4>
        <h5>Course ID: {{ $curriculum->course_id }}</h5>
    </div>

        <div class="sub_dashboard">
        <div class="rec_dashboard3">
    <table class="rooms-table">
        <thead>
            <tr>
                <th scope="col">Subject Name</th>
                <th scope="col">Description</th>
                <th scope="col">Subject Code</th>
                <th scope="col">ID</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody class="subject-table">
        <h2>Subjects</h2>
            @forelse($curriculum->subjects as $subject)
            <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->description }}</td>
                    <td>{{ $subject->code }}</td>
                    <td>{{ $subject->id }}</td>
                    <td>
                        <form action="{{ route('subjects.detach', ['curriculumId' => $curriculum->id, 'subjectId' => $subject->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Detach</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No subjects found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
        </div>
        </div>
        <div>
    <a href="{{ route('subjects_list', $curriculum->id) }}" class="add-sub btn btn-primary">Add Subject</a>
</div>


@endsection
