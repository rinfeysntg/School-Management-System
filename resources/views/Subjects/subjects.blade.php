
@include('registrar.navbar_registrar')
@extends('layout')
@section('content')


<div class="sub_dashboard">
<h1 class="createroomLbl">Subjects</h1>
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
            @forelse ($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->description }}</td>
                    <td>{{ $subject->code }}</td>
                    <td>{{ $subject->id }}</td>
                    <td class="button-sub-container">
                        <a href="{{ route('subjects_edit', $subject->id) }}" class="editsub-btn">Edit</a>
                        <form action="{{ route('subjects_destroy', $subject->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="deletesub-btn">Delete</button>
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
    
    <div>
        <a href="{{ route('curriculums_index') }}" class="add-sub">Add</a>
    </div>

</div>
@endsection

