<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-md">
    <a class="navbar-brand" href="#">WUP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDropdownMenuLink" aria-controls="navbarDropdownMenuLink" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('student_dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Announcements</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Academics</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Schedule</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Attendance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('enrollment_dashboard') }}">Enrollment</a>
        </li>
      </ul>
    </div>
  </div>
</nav>