<div>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach (json_decode($positions) as $position)
            <div class="col">
                <div class="card h-100 glass-effect">
                    <div style="padding:10px" class="card-body">
                        <h5 style="color:white" class="card-title">{{ $position->name }}</h5>
                        <h4 style="color:white" class="card-text">ID {{ $position->id }}</h4>

                        <!-- Edit Button that Triggers Modal -->
                        <button type="button" class="btn btn-primary glass-button mb-2" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $position->id }}">EDIT</button>

                        <!-- View Details Button that Triggers Modal -->
                        <button type="button" class="btn btn-info glass-button mb-2" data-bs-toggle="modal" data-bs-target="#viewProductModal{{ $position->id }}">VIEW DETAILS</button>

                        <!-- Delete Form -->
                        <form action="{{ route('delete_position', $position->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mb-2">DELETE</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal for Editing position -->
            <!-- Modal for Editing position -->
<div class="modal fade" id="editProductModal{{ $position->id }}" tabindex="-1" aria-labelledby="editProductModalLabel{{ $position->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content glass-effect">
            <div class="modal-header">
                <h5 style="color:white" class="modal-title" id="editProductModalLabel{{ $position->id }}">Edit Position - {{ $position->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('edit_position') }}" method="POST" id="editProductForm{{ $position->id }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $position->id }}">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="name" value="{{ old('name', $position->name) }}" required>
                        <label for="name">Name</label>
                        @error('name')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="description" value="{{ old('description', $position->description) }}" required>
                        <label for="description">Description</label>
                        @error('description')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="rate" id="rate" placeholder="rate" value="{{ $position->rate }}" required>
                        <label for="rate">Rate</label>
                    </div>

                    <!-- Role Dropdown -->
                    <div class="form-floating mb-3">
                        <select class="form-control" name="role_id" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $position->role_id == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="role_id">Role</label>
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
                            <h5 style="color:white" class="modal-title" id="viewProductModalLabel{{ $position->id }}">Position Details - {{ $position->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div style="color:white" class="modal-body">
                            <p><strong>ID:</strong> {{ $position->id }}</p>
                            <p><strong>Name:</strong> {{ $position->name }}</p>
                            <p><strong>Description:</strong> {{ $position->description }}</p>
                            <p><strong>rate:</strong> {{ $position->rate }}</p>
                            <p><strong>Role:</strong> {{ $roles->where('id', $position->role_id)->first()->name ?? 'Unknown' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
