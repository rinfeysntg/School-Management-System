<div>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach (json_decode($users) as $user)
            <div class="col">
                <div class="card h-100 glass-effect">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $user->name }}
                        </h5>
                        <h4 class="card-text">ID {{ $user->id }}</h4>

                        <!-- Edit Button that Triggers Modal -->
                        <button type="button" class="btn btn-primary glass-button" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $user->id }}">EDIT</button>

                        <!-- View Details Button that Triggers Modal -->
                        <button type="button" class="btn btn-info glass-button" data-bs-toggle="modal" data-bs-target="#viewProductModal{{ $user->id }}">VIEW DETAILS</button>

                        <!-- Delete Form -->
                        <form action="{{ route('delete_user', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal for Editing user -->
            <div class="modal fade" id="editProductModal{{ $user->id }}" tabindex="-1" aria-labelledby="editProductModalLabel{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content glass-effect">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProductModalLabel{{ $user->id }}">Edit Product - {{ $user->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('edit_user') }}" method="POST" id="editProductForm{{ $user->id }}">
                                @csrf
                                <div>
                                    <div class="form-floating mb-3">
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{ $user->name }}" required>
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="age" id="age" placeholder="age" value="{{ $user->age }}" required>
                                        <label for="age">Age</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{ $user->address }}" required>
                                        <label for="address">Address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ $user->username }}" required>
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $user->email }}" required>
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{ $user->password }}" required>
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="role_id" class="form-control" name="role_id" id="role_id" placeholder="Role_id" value="{{ $user->role_id }}" required>
                                        <label for="role_id">Role_id</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" id="submitButton">Edit user</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="viewProductModal{{ $user->id }}" tabindex="-1" aria-labelledby="viewProductModalLabel{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content glass-effect">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewProductModalLabel{{ $user->id }}">User Details - {{ $user->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>ID:</strong> {{ $user->id }}</p>
                            <p><strong>Name:</strong> {{ $user->name }}</p>
                            <p><strong>Age:</strong> {{ $user->age }}</p>
                            <p><strong>Address:</strong> {{ $user->address }}</p>
                            <p><strong>Username:</strong> {{ $user->username }}</p>
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <p><strong>Password:</strong> {{ $user->password }}</p>
                            <p><strong>Role_id:</strong> {{ $user->role_id }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
