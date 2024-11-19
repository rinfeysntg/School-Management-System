<div>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach (json_decode($positions) as $position)
            <div class="col">
                <div class="card h-100 glass-effect">
                    <div class="card-body">
                        <h5 class="card-title">{{ $position->name }}</h5>
                        <h4 class="card-text">ID {{ $position->id }}</h4>

                        <!-- Edit Button that Triggers Modal -->
                        <button type="button" class="btn btn-primary glass-button" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $position->id }}">EDIT</button>

                        <!-- View Details Button that Triggers Modal -->
                        <button type="button" class="btn btn-info glass-button" data-bs-toggle="modal" data-bs-target="#viewProductModal{{ $position->id }}">VIEW DETAILS</button>

                        <!-- Delete Form -->
                        <form action="{{ route('delete_position', $position->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal for Editing position -->
            <div class="modal fade" id="editProductModal{{ $position->id }}" tabindex="-1" aria-labelledby="editProductModalLabel{{ $position->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content glass-effect">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProductModalLabel{{ $position->id }}">Edit Position - {{ $position->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('edit_position') }}" method="POST" id="editProductForm{{ $position->id }}">
                                @csrf
                                <div>
                                    <div class="form-floating mb-3">
                                        <input type="hidden" name="id" value="{{ $position->id }}">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{ $position->name }}" required>
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="description" id="description" placeholder="description" value="{{ $position->description }}" required>
                                        <label for="description">Description</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="rate" id="rate" placeholder="rate" value="{{ $position->rate }}" required>
                                        <label for="rate">Rate</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <!-- Role Dropdown with String Values -->
                                        <select class="form-control" name="role_id" required>
                                            <option value="admin" {{ $position->role_id == 1 ? 'selected' : '' }}>Admin</option>
                                            <option value="registrar" {{ $position->role_id == 2 ? 'selected' : '' }}>Registrar</option>
                                            <option value="treasury" {{ $position->role_id == 3 ? 'selected' : '' }}>Treasury</option>
                                            <option value="program_head" {{ $position->role_id == 4 ? 'selected' : '' }}>Program Head</option>
                                            <option value="human_resource" {{ $position->role_id == 5 ? 'selected' : '' }}>Human Resource</option>
                                            <option value="professors" {{ $position->role_id == 6 ? 'selected' : '' }}>Professors</option>
                                            <option value="students" {{ $position->role_id == 7 ? 'selected' : '' }}>Students</option>
                                        </select>
                                        <label for="role_id">Role</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" id="submitButton">Edit position</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Viewing position details -->
            <div class="modal fade" id="viewProductModal{{ $position->id }}" tabindex="-1" aria-labelledby="viewProductModalLabel{{ $position->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content glass-effect">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewProductModalLabel{{ $position->id }}">Position Details - {{ $position->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>ID:</strong> {{ $position->id }}</p>
                            <p><strong>Name:</strong> {{ $position->name }}</p>
                            <p><strong>Description:</strong> {{ $position->description }}</p>
                            <p><strong>rate:</strong> {{ $position->rate }}</p>
                            <p><strong>Role ID:</strong> {{ $position->role_id }}</p>
                            <p><strong>Role Name:</strong>
                                @php
                                    $roleNames = [
                                        1 => 'Admin',
                                        2 => 'Registrar',
                                        3 => 'Treasury',
                                        4 => 'Program Head',
                                        5 => 'Human Resource',
                                        6 => 'Professors',
                                        7 => 'Students',
                                    ];
                                @endphp
                                {{ $roleNames[$position->role_id] ?? 'Unknown Role' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
