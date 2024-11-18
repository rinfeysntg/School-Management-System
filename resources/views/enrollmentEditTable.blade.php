
<div>
    <h1>Edit Enrollment</h1>

    <form action="{{ route('enrollment.update', $enrollment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Student:</label>
            <input type="text" name="name" value="{{ $enrollment->user->name }}" readonly>
        </div>

        <br>

        <div>
            <label for="status">Status:</label>
            <select name="status" required>
                <option value="Enrolled" {{ $enrollment->status == 'Enrolled' ? 'selected' : '' }}>Enrolled</option>
                <option value="Not Enrolled" {{ $enrollment->status == 'Not Enrolled' ? 'selected' : '' }}>Not Enrolled</option>
            </select>
        </div>

        <br>

        <div>
            <button type="submit">Update Enrollment</button>
        </div>
    </form>

    <br>

    <div>
        <a href="{{ route('enrollmentTable') }}"><button>Return</button></a>
    </div>
</div>
@endsection
