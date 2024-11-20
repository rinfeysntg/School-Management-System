@extends('layout')
@include('registrar.navbar_registrar')

@section('content')
    <title>Buildings List</title>
    <div class="sub_dashboard">
    
    <h1 class="createroomLbl">Buildings</h1>
    <div class="rec_dashboard3">
        <table class="rooms-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="subject-table">
                @foreach($buildings as $building)
                    <tr>
                        <td>{{ $building->id }}</td>
                        <td><strong>{{ $building->name }}</strong><br>
                        <span class="description">{{ $building->description }}</span></td>
                        <td>
                            <a href="{{ route('buildings_show', $building->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('building.edit', $building->id) }}" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('building.destroy', $building->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <div class="button-container">
            <a href="{{ route('building.create') }}" class="add-sub">Create New Building</a>
        </div>
    
    </div>
@endsection
