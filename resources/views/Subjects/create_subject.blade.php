@extends('layout')

@section('content')
    <div class="form-background">
        <div class="form-container">
            <h2 class="form-title">Add Subject</h2>

            <form action="{{ route('store_subject') }}" method="POST">
        @csrf
                <div class="mb-3">
                    <label for="code" class="form-label">Code:</label>
                    <input type="text" id="code" name="code" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea id="description" name="description" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="curriculum_id" class="form-label">Curriculum ID:</label>
                    <select id="curriculum_id" name="curriculum_id" required class="form-control">
                        <option value="">Select Curriculum</option>
                        
                        <option value="1">Curriculum 1</option>
                        <option value="2">Curriculum 2</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-submit">Add</button>
            </form>
        </div>
    </div>
@endsection