<div>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($users as $user)
            <div class="col">
                <div class="card h-100 glass-effect">
                    <div style="padding:10px" class="card-body">
                        <h5 style="color:white" class="card-title">{{ $user->name }}</h5>
                        <h4 style="color:white" class="card-text">ID {{ $user->id }}</h4>

                        <!-- Edit Button -->
                        <button type="button" class="btn btn-primary glass-button mb-2" data-bs-toggle="modal" data-bs-target="#editStudentModal{{ $user->id }}">EDIT</button>

                        <!-- View Details Button -->
                        <button type="button" class="btn btn-info glass-button mb-2" data-bs-toggle="modal" data-bs-target="#viewStudentModal{{ $user->id }}">VIEW DETAILS</button>

                        <!-- Delete Button -->
                        <form action="{{ route('delete_student', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mb-2">DELETE</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit User Modal -->
<div class="modal fade" id="editStudentModal{{ $user->id }}" tabindex="-1" aria-labelledby="editStudentModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content glass-effect">
            <div class="modal-header">
                <h5 style="color:white" class="modal-title" id="editStudentModalLabel{{ $user->id }}">Edit Student - {{ $user->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('edit_student') }}" method="POST">
                    @csrf
                    <!-- Include the User ID -->
                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <!-- Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Name" required>
                        <label for="name">Name</label>
                    </div>

                    <!-- Age -->
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="age" value="{{ $user->age }}" placeholder="Age" required>
                        <label for="age">Age</label>
                    </div>

                    <!-- Address -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="address" value="{{ $user->address }}" placeholder="Address" required>
                        <label for="address">Address</label>
                    </div>

                    <!-- Username -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" value="{{ $user->username }}" placeholder="Username" required>
                        <label for="username">Username</label>
                    </div>

                    <!-- Email -->
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email" required>
                        <label for="email">Email</label>
                    </div>

                    <!-- Password (Editable Field) -->
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" value="{{ $user->password }}" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>

                <!-- Department -->
                    <div class="form-floating mb-3">
                        <select class="form-control" name="department_id">
                            <option value="">None</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ $user->department_id == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="department_id">Department</label>
                    </div>

                    <!-- Course -->
                    <div class="form-floating mb-3">
                        <select class="form-control" name="course_id">
                            <option value="">None</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" {{ $user->course_id == $course->id ? 'selected' : '' }}>
                                    {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="course_id">Course</label>
                    </div>

                    <!-- Year Level -->
                    <div class="form-floating mb-3">
                        <select class="form-control" name="year_level">
                            <option value="">Select Year Level</option>
                            <option value="1Y" {{ $user->year_level == '1Y' ? 'selected' : '' }}>1st Year</option>
                            <option value="2Y" {{ $user->year_level == '2Y' ? 'selected' : '' }}>2nd Year</option>
                            <option value="3Y" {{ $user->year_level == '3Y' ? 'selected' : '' }}>3rd Year</option>
                            <option value="4Y" {{ $user->year_level == '4Y' ? 'selected' : '' }}>4th Year</option>
                        </select>
                        <label for="year_level">Year Level</label>
                    </div>

                    <!-- Block -->
                    <div class="form-floating mb-3">
                        <select class="form-control" name="block">
                            <option value="">Select Block</option>
                            <option value="B1" {{ $user->block == 'B1' ? 'selected' : '' }}>Block 1</option>
                            <option value="B2" {{ $user->block == 'B2' ? 'selected' : '' }}>Block 2</option>
                            <option value="B3" {{ $user->block == 'B3' ? 'selected' : '' }}>Block 3</option>
                            <option value="B4" {{ $user->block == 'B4' ? 'selected' : '' }}>Block 4</option>
                        </select>
                        <label for="block">Block</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success">Update Student</button>
                </form>
            </div>
        </div>
    </div>
</div>


            <!-- View User Modal -->
            <div class="modal fade" id="viewStudentModal{{ $user->id }}" tabindex="-1" aria-labelledby="viewStudentModalLabel{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content glass-effect">
                        <div class="modal-header">
                            <h5 style="color:white" class="modal-title" id="viewStudentModalLabel{{ $user->id }}">Student Details - {{ $user->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div style="color:white" class="modal-body">
                            <p><strong>ID:</strong> {{ $user->id }}</p>
                            <p><strong>Name:</strong> {{ $user->name }}</p>
                            <p><strong>Age:</strong> {{ $user->age }}</p>
                            <p><strong>Address:</strong> {{ $user->address }}</p>
                            <p><strong>Username:</strong> {{ $user->username }}</p>
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <p><strong>Password:</strong> {{ $user->password }}</p>
                            <p><strong>Department:</strong> {{ $user->department_id ? $departments->find($user->department_id)->name : 'None' }}</p>
                            <p><strong>Course:</strong> {{ $user->course_id ? $courses->find($user->course_id)->name : 'None' }}</p>
                            <p><strong>Year Level:</strong> 
                            @if ($user->year_level)
                                @switch($user->year_level)
                                    @case('1Y') 1st Year @break
                                    @case('2Y') 2nd Year @break
                                    @case('3Y') 3rd Year @break
                                    @case('4Y') 4th Year @break
                                    @default {{ $user->year_level }}
                                @endswitch
                            @else
                                Not Selected
                            @endif
                        </p>
                            <p><strong>Block:</strong> 
                                @if ($user->block)
                                    @switch($user->block)
                                        @case('B1') Block 1 @break
                                        @case('B2') Block 2 @break
                                        @case('B3') Block 3 @break
                                        @case('B4') Block 4 @break
                                        @default {{ $user->block }}
                                    @endswitch
                                @else
                                    Not Selected
                                @endif
                            </p>
                            <p><strong>Role:</strong> {{ $user->role_id ? $roles->find($user->role_id)->name : 'None' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
