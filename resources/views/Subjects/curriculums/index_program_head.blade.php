@extends('layout')
@include('navbar_programhead')
@section('content')
    <title>Assigned Curriculums</title>
    <div class="sub_dashboard">
        <h1 class="createroomLbl">Assigned Curriculums</h1>
        <div class="rec_dashboard3">
            <table class="rooms-table">
                <thead>
                    <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody class="subject-table">
                    @foreach($curriculums as $curriculum)
                        <tr>
                            <td>{{ $curriculum->code }}</td>
                            <td>{{ $curriculum->name }}</td>

                            <td><a href="{{ route('subjects_program_head', $curriculum->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('schedule.create', ['curriculumId' => $curriculum->id]) }}" class="btn btn-info btn-sm">Create Schedule</a>
                            <a href="{{ route('schedule.show', ['curriculumId' => $curriculum->id]) }}" class="btn btn-info btn-sm">View Schedule</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection