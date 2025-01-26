@extends('layout')
@include('navbar_student')
@section('content')

<div class="rec_dashboard">
    <h1 class="createroomLbl">Grades</h1>

    @if($subjects->isEmpty())
        <div class="alert alert-info">
            No subjects found for your account.
        </div>
    @else
        <div class="rec_dashboard4" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
            <table class="rooms-table" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Professor</th>
                        <th>Final Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subjects as $subject)
                        <tr>
                            <td>{{ $subject->name }}</td>
                            <td>
                                @isset($professors[$subject->id])
                                    {{ $professors[$subject->id]->name ?? 'N/A' }}
                                @else
                                    N/A
                                @endisset
                            </td>
                            <td>
                                @if(isset($finalGrades[$subject->id]))
                                    {{ number_format($finalGrades[$subject->id], 2) }} 
                                @else
                                    Not Graded
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection
