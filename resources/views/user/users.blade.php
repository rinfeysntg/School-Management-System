@extends('layoutuser')

@section('UserControl')
<br>
<div>
    <a class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#addUserModal">Add Users</a>
</div>
<h1>User list</h1>
@include('user.User-cards')

<!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserModalLabel">Create Users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('store_user') }}" method="POST" id="productForm">
            @csrf
            <div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="name" required>
                    <label for="name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="age" id="age" placeholder="age" required>
                    <label for="age">Age</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
                    <label for="address">Address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="role_id" class="form-control" name="role_id" id="role_id" placeholder="Role_id" required>
                    <label for="role_id">Role_id</label>
                </div>
                <button type="submit" class="btn btn-success" id="submitButton">Add Employee</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
    // Get all the form fields and the submit button
    const formFields = document.querySelectorAll('input[required]');
    const submitButton = document.getElementById('submitButton');

    // Function to check if all required fields are filled
    function checkFormCompletion() {
        let allFilled = true;
        formFields.forEach(field => {
            if (!field.value) {
                allFilled = false;
            }
        });
        // Enable or disable the submit button
        submitButton.disabled = !allFilled;
    }

    // Add event listeners to check the form on input change
    formFields.forEach(field => {
        field.addEventListener('input', checkFormCompletion);
    });

    // Initial check on page load
    checkFormCompletion();
</script>
@endsection
