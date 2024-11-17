@extends('layoutcurriculumTable')

@section('curriculumTabledashboard')
<div class="glass">
    <h1 class="heading">Curriculums</h1>
    <div class="frame">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Building</td>
                    <td>Sample description 1</td>
                    <td>
                        <button class="edit-button">Edit</button>
                        <button class="delete-button">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Building</td>
                    <td>Sample description 2</td>
                    <td>
                        <button class="edit-button">Edit</button>
                        <button class="delete-button">Delete</button>
                    </td>
                </tr>
                <!-- Add more rows dynamically or manually -->
            </tbody>
        </table>
    </div>
    <div class="button-container">
        <a href="{{ route('curriculumDashboard') }}"><button class="btn">Return</button></a>
</div>
@endsection
