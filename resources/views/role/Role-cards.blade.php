<div>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($roles as $role)
            <div class="col">
                <div class="card h-100 glass-effect">
                    <div style="padding:10px" class="card-body">
                        <h5 style="color:white" class="card-title">{{ $role->name }}</h5>
                        <h4 style="color:white" class="card-text">ID {{ $role->id }}</h4>

                        <!-- Edit Button -->
                        <button type="button" class="btn btn-primary glass-button mb-2" data-bs-toggle="modal" data-bs-target="#editRoleModal{{ $role->id }}">EDIT</button>

                        <!-- View Details Button -->
                        <button type="button" class="btn btn-info glass-button mb-2" data-bs-toggle="modal" data-bs-target="#viewRoleModal{{ $role->id }}">VIEW DETAILS</button>

                        <!-- Delete Button -->
                        <form action="{{ route('delete_role', $role->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mb-2">DELETE</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal for Editing Role -->
            <div class="modal fade" id="editRoleModal{{ $role->id }}" tabindex="-1" aria-labelledby="editRoleModalLabel{{ $role->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content glass-effect">
                        <div class="modal-header">
                            <h5 style="color:white" class="modal-title" id="editRoleModalLabel{{ $role->id }}">Edit Role - {{ $role->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('edit_role') }}" method="POST" id="editRoleForm{{ $role->id }}">
                                @csrf
                                <div>
                                <div class="form-floating mb-3">
                                    <input type="hidden" name="id" value="{{ $role->id }}">
                                    <select class="form-control" name="name" id="name" required>
                                        <option value="admin" {{ $role->name == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="registrar" {{ $role->name == 'registrar' ? 'selected' : '' }}>Registrar</option>
                                        <option value="treasury" {{ $role->name == 'treasury' ? 'selected' : '' }}>Treasury</option>
                                        <option value="program_head" {{ $role->name == 'program_head' ? 'selected' : '' }}>Program Head</option>
                                        <option value="human_resource" {{ $role->name == 'human_resource' ? 'selected' : '' }}>Human Resource</option>
                                        <option value="professors" {{ $role->name == 'professors' ? 'selected' : '' }}>Professors</option>
                                        <option value="students" {{ $role->name == 'students' ? 'selected' : '' }}>Students</option>
                                    </select>
                                    <label for="name">Role</label>
                                </div>
                                </div>
                                <button type="submit" class="btn btn-success" id="submitButton">Edit Role</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Viewing Role Details -->
            <div class="modal fade" id="viewRoleModal{{ $role->id }}" tabindex="-1" aria-labelledby="viewRoleModalLabel{{ $role->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content glass-effect">
                        <div class="modal-header">
                            <h5 style="color:white" class="modal-title" id="viewRoleModalLabel{{ $role->id }}">Role Details - {{ $role->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div style="color:white" class="modal-body">
                            <p><strong>ID:</strong> {{ $role->id }}</p>
                            <p><strong>Name:</strong> {{ $role->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
