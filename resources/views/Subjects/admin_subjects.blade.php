@extends('layout')

@section('content')

<h1>Manage Subjects</h1>

<ul>
@foreach ($subjects as $subject)
        <li>{{ $subject->name }} - {{ $subject->code }}</li>
    @endforeach
</ul>
<a href="/subjects/create" class="btn btn-secondary btn-create">Create a New Subject</a>
@endsection