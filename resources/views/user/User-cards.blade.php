<div>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($users as $user)
            <div class="col">
                <div class="card h-100 glass-effect">
                    <div style="padding:10px" class="card-body">
                        <h5 style="color:white" class="card-title">{{ $user->name }}</h5>
                        <h4 style="color:white" class="card-text">ID {{ $user->id }}</h4>

                        <!-- Edit Button -->
                        <button type="button" class="btn btn-primary glass-button mb-2" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">EDIT</button>

                        <!-- View Details Button -->
                        <button type="button" class="btn btn-info glass-button mb-2" data-bs-toggle="modal" data-bs-target="#viewUserModal{{ $user->id }}">VIEW DETAILS</button>

                        <!-- Delete Button -->
                        <form action="{{ route('delete_user', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mb-2">DELETE</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit User Modal -->
<div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content glass-effect">
            <div class="modal-header">
                <h5 style="color:white" class="modal-title" id="editUserModalLabel{{ $user->id }}">Edit User - {{ $user->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('edit_user') }}" method="POST">
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

                    <!-- Role Dropdown -->
                    <div class="form-floating mb-3">
                        <select class="form-control" name="role_id" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="role_id">Role</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success">Update User</button>
                </form>
            </div>
        </div>
    </div>
</div>


            <!-- View User Modal -->
            <div class="modal fade" id="viewUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="viewUserModalLabel{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content glass-effect">
                        <div class="modal-header">
                            <h5 style="color:white" class="modal-title" id="viewUserModalLabel{{ $user->id }}">User Details - {{ $user->name }}</h5>
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
                            <p><strong>Role:</strong> {{ $user->role_id = $role ? $role->name : null; }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
