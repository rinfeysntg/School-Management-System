@extends('layout')
@include('registrar.navbar_registrar')

@section('content')

    <div class="sub_dashboard">
        <h1 class="subh1">Available Subjects</h1>
        <div class="rec_dashboard3">
        
        <form action="{{ route('attach_subjects', $curriculum->id) }}" method="POST">
            @csrf

            <table class="rooms-table">
                <thead>
                    <tr>
                        <th scope="col">Select</th>
                        <th scope="col">Subject Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Subject Code</th>
                        <th scope="col">ID</th>
                    </tr>
                </thead>
                <tbody class="subject-table">
                    @forelse($subjects as $subject)
                        <tr>
                            <td>
                                <input type="checkbox" name="subjects[]" value="{{ $subject->id }}">
                            </td>
                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->description }}</td>
                            <td>{{ $subject->code }}</td>
                            <td>{{ $subject->id }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No subjects found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
            <button type="submit" class="add-subcur">Add Selected Subjects</button>
        </form>
    </div>
    

@endsection
