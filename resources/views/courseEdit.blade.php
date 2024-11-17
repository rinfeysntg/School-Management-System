@extends('layoutcourse')

@section('coursedashboard')
<div class="glass">
    <h1 class="heading">Edit Course</h1>
    <div class="frame">
        <form id="editCourseForm" action="{{ route('courses.update', $course->id) }}" method="POST" onsubmit="return confirmUpdate()">
            @csrf
            @method('PUT') 
            
            <h4>Name: <input type="text" name="name" value="{{ old('name', $course->name) }}" required></h4>
            <br>
            <h4>Description: <input type="text" name="description" value="{{ old('description', $course->description) }}" required></h4>
            <br>
            <h4>Department ID: 
                <select id="dropdown" name="department_id" required>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ $department->id == $course->department_id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </h4>
            <br>
            <div class="button-container">
                <button type="submit" class="btn" id="updateButton">Update</button>
            </div>
        </form>
        <br>
        <div class="button-container">
            <a href="{{ route('courseDashboard') }}"><button class="btn">Return</button></a>
        </div>
    </div>
</div>

<script>
    function confirmUpdate() {
        if (confirm('Update Course?')) {
            setTimeout(() => {
                alert('Course Updated');
            }, 100);
            return true;
        }
        return false;
    }
</script>
@endsection
