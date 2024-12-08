@extends('layouts.app')

@section('title', 'Grade Breakdown')

@section('content')
    <h1>Grade Breakdown</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Term</th>
                <th>Year</th>
                <th>Final Grade</th>
                <th>Professor</th>
            </tr>
        </thead>
        <tbody>
            @forelse($grades as $grade)
                <tr>
                    <td>{{ $grade->student->name }}</td>
                    <td>{{ $grade->term }}</td>
                    <td>{{ $grade->year }}</td>
                    <td>{{ $grade->final_grade }}</td>
                    <td>{{ $grade->professor->name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No grades found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
