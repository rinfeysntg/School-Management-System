@extends('payroll_layout')

@section('content')
    <div class="grid-container">
        <div class="grid-table">
            <table id="table_list">
                <thead>
                    <th scope="col" onclick="sortTable(0)">User ID#</th>
                    <th scope="col" onclick="sortTable(1)">Name</th>
                    <th scope="col" onclick="sortTable(2)">Username</th>
                    <th scope="col" onclick="sortTable(3)">Role</th>
                    <th scope="col" onclick="sortTable(4)">Position</th>
                    <th scope="col" onclick="sortTable(4)">Rate</th>
                    <th scope="col" onclick="sortTable(5)">Department</th>
                    <th scope="col" onclick="sortTable(5)">Date Start</th>
                    <th scope="col" onclick="sortTable(5)">Date End</th>
                    <th scope="col" class="hidden-columns">Birthdate</th>
                    <th scope="col" class="hidden-columns">Mobile No.</th>
                    <th scope="col" class="hidden-columns">E-mail</th>
                    <th scope="col" class="hidden-columns">Date of Hire</th>
                    <th scope="col" class="hidden-columns">Address</th>
                </thead>
                <tbody id="table_list2">
                </tbody>
            </table>
        </div>
        <div class="grid-slip">
            <div class="payslip-header">
            <h1>Pay Slip</h1>
            <p>- - - - - - - - - - - - - - - - - - - - - -</p>
            </div>
            <p>User ID: <span class="user_id_ps"></span></p>
            <P>Full Name: <span class="name_ps"></span></p>
            <P>Department: <span class="department_ps"></span></p>
            <P>Salary: <span class="salary_ps"></span></p>
            <P>Deductions/ Not Earned: <span class="deductions_ps"></span></p>
            <P>Total Payment: <span class="total_ps"></span></p>
        </div>
        <form action="{{ route('payroll.store') }}" method="POST" class="grid-info">
            @csrf
            <div class="info-first-column info-column">
                <div class="input-box">
                    <label for="date_start_create"><strong>Date Start:</strong></label>
                    <input id="date_start_create" name="date_start_create"value="{{ old('date_start_create') }}" required>
                </div>

                <div class="input-box">
                    <label for="position">Position:</label>
                    <input id="position" name="position" readonly>
                </div>
                
                <div class="input-box">
                    <label for="department">Dept.:</label>
                    <input id="department" name="department" readonly>
                </div>
                
                <div class="input-box">
                    <label for="role">Role:</label>
                    <input id="role" name="role" readonly>
                </div>
                
                <div class="input-box">
                    <label for="mobile-no">Mobile No.:</label>
                    <input id="mobile-no" name="mobile-no" readonly>
                </div>
                
                <div class="input-box">
                    <label for="email">E-mail:</label>
                    <input id="email" name="email" readonly>
                </div>
            </div>
            <div class="info-second-column info-column">
                <div class="input-box">
                    <label for="date_end_create"><strong>Date End:</strong></label>
                    <input id="date_end_create" name="date_end_create" value="{{ old('date_end_create') }}" required >
                </div>
                
                <div class="input-box">
                    <label for="user_id_create"><strong>User ID#:</strong></label>
                    <input id="user_id_create" name="user_id_create" value="{{ old('user_id_create') }}" required>
                </div>
                
                <div class="input-box">
                    <label for="name">Name:</label>
                    <input id="name" name="name" readonly>
                </div>

                <div class="input-box">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" rows="5" cols="27" readonly></textarea>
                </div>
            </div>
            <div class="info-third-column info-column">
                <div class="input-box">
                    <label for="salary_create">Salary:</label>
                    <input id="salary_create" name="salary_create" value='0' readonly>
                </div>
                <div class="input-box">
                    <label for="deductions_create">Deductions/ Not Earned:</label>
                    <input id="deductions_create" name="deductions_create" value='0' readonly>
                </div>
                <div class="input-box">
                    <label for="total_create">Total:</label>
                    <input id="total_create" name="total_create" readonly>
                </div>
                <button type="submit" class="btn btn-success track">Track</button>
                @error('user_id_create')
                    <div class="alert alert-danger">User already in payroll/<br>User does not exist</div>
                @enderror
            </div>
        </form>
        <div class="function-box">
            <div class="search-box ssi-item">
                <label for="search" class="search-label">Search:</label>
                <input id="search" name="search" onkeyup="searchSimilar()">
            </div>

            {{-- <form class="salary-info ssi-item">
                <div class="input-box">
                    <label for="salary">Salary:</label>
                    <input id="salary" name="salary">
                </div>
                <div class="input-box">
                    <label for="deductions">Deductions:</label>
                    <input id="deductions" name="deductions">
                </div>
                <div class="input-box">
                    <label for="total">Total:</label>
                    <input id="total" name="total">
                </div>
            </form> --}}
        </div>
    </div>
@endsection