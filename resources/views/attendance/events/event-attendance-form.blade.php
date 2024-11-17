<h1>Log Attendance for Event: {{ $event->name }}</h1>

<form method="POST" action="{{ route('attendance.event.store', $event->id) }}">
    @csrf
    <label for="student_id">Enter Your Student ID</label>
    <input type="text" name="student_id" id="student_id" required>

    <button type="submit">Log Attendance</button>
</form>
