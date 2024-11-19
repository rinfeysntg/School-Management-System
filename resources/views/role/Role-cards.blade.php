<div>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach (json_decode($roles) as $role)
            <div class="col">
                <div class="card h-100 glass-effect">
                    <div class="card-body">
                        <h5 class="card-title">{{ $role->name }}</h5>
                        <h4 class="card-text">ID {{ $role->id }}</h4>

                        <!-- Edit Button that Triggers Modal -->
                        <button type="button" class="btn btn-primary glass-button" data-bs-toggle="modal" data-bs-target="#editRoleModal{{ $role->id }}">EDIT</button>

                        <!-- View Details Button that Triggers Modal -->
                        <button type="button" class="btn btn-info glass-button" data-bs-toggle="modal" data-bs-target="#viewRoleModal{{ $role->id }}">VIEW DETAILS</button>

                        <!-- Delete Form -->
                        <form action="{{ route('delete_role', $role->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal for Editing Role -->
            <div class="modal fade" id="editRoleModal{{ $role->id }}" tabindex="-1" aria-labelledby="editRoleModalLabel{{ $role->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content glass-effect">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editRoleModalLabel{{ $role->id }}">Edit Role - {{ $role->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('edit_role') }}" method="POST" id="editRoleForm{{ $role->id }}">
                                @csrf
                                <div>
                                    <div class="form-floating mb-3">
                                        <input type="hidden" name="id" value="{{ $role->id }}">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{ $role->name }}" required>
                                        <label for="name">Name</label>
                                    </div>       
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="description" id="description" placeholder="description" value="{{ $role->description }}" required>
                                        <label for="description">Description</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="yearlevel" id="yearlevel" placeholder="yearlevel" value="{{ $role->yearlevel }}" required>
                                        <label for="yearlevel">yearlevel</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <!-- Role Dropdown with String Values -->
                                        <select class="form-control" name="dept_id" required>
                                            <option value="CAMS" {{ $role->dept_id == 1 ? 'selected' : '' }}>CAMS</option>
                                            <option value="CAS" {{ $role->dept_id == 2 ? 'selected' : '' }}>CAS</option>
                                            <option value="CBA" {{ $role->dept_id == 3 ? 'selected' : '' }}>CBA</option>
                                            <option value="CCJE" {{ $role->dept_id == 4 ? 'selected' : '' }}>CCJE</option>
                                            <option value="CECT" {{ $role->dept_id == 5 ? 'selected' : '' }}>CECT</option>
                                            <option value="CHTM" {{ $role->dept_id == 6 ? 'selected' : '' }}>CHTM</option>
                                            <option value="COED" {{ $role->dept_id == 7 ? 'selected' : '' }}>COED</option>
                                            <option value="CON" {{ $role->dept_id == 8 ? 'selected' : '' }}>CON</option>
                                        </select>
                                        <label for="dept_id">Role</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" id="submitButton">Edit Role</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Viewing Role details -->
            <div class="modal fade" id="viewRoleModal{{ $role->id }}" tabindex="-1" aria-labelledby="viewRoleModalLabel{{ $role->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content glass-effect">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewRoleModalLabel{{ $role->id }}">Role Details - {{ $role->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>ID:</strong> {{ $role->id }}</p>
                            <p><strong>Name:</strong> {{ $role->name }}</p>
                            <p><strong>Description:</strong> {{ $role->description }}</p>
                            <p><strong>Yearlevel:</strong> {{ $role->yearlevel }}</p>
                            <p><strong>Role ID:</strong> {{ $role->dept_id }}</p>
                            <p><strong>Role Name:</strong>
                                @php
                                    $roleNames = [
                                        1 => 'CAMS',
                                        2 => 'CAS',
                                        3 => 'CBA',
                                        4 => 'CCJE',
                                        5 => 'CECT',
                                        6 => 'CHTM',
                                        7 => 'COED',
                                        8 => 'CON',
                                    ];
                                @endphp
                                {{ $roleNames[$role->dept_id] ?? 'Unknown Role' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
