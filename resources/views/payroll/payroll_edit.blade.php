@extends('payroll_layout_edit')

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
                    <th scope="col" onclick="sortTable(5)">Rate</th>
                    <th scope="col" onclick="sortTable(6)">Department</th>
                    <th scope="col" onclick="sortTable(7)">Date Start</th>
                    <th scope="col" onclick="sortTable(8)">Date End</th>
                    <th scope="col" class="hidden-columns">E-mail</th>
                    <th scope="col" class="hidden-columns">Address</th>
                    <th scope="col" class="hidden-columns">Salary</th>
                    <th scope="col" class="hidden-columns">Deductions</th>
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
        <form action="{{ route('payroll.update', $data[0]->payroll_id) }}"class="grid-info" method="POST">
            @csrf
            @method('PUT') <!-- This ensures it's a PUT request for updating -->
            <div class="info-first-column info-column">
                <div class="input-box">
                    <label for="date_start_update">Date Start:</label>
                    <input id="date_start_update" value="{{$data[0]->date_start}}" name="date_start_update" readonly>
                </div>
                <div class="input-box">
                    <label for="position_update">Position:</label>
                    <input id="position_update" value="{{$data[0]->position}}" name="position_update" readonly>
                </div>
                
                <div class="input-box">
                    <label for="department_update">Dept.:</label>
                    <input id="department_update" value="{{$data[0]->department}}"name="department_update" readonly>
                </div>
                
                <div class="input-box">
                    <label for="role_update">Role:</label>
                    <input id="role_update" value="{{$data[0]->role}}" name="role_update" readonly>
                </div>
                
                <div class="input-box">
                    <label for="email_update">E-mail:</label>
                    <input id="email_update" value="{{$data[0]->email}}" name="email_update" readonly>
                </div>
            </div>
            <div class="info-second-column info-column">
                <div class="input-box">
                    <label for="date_end_update">Date End:</label>
                    <input id="date_end_update" value="{{$data[0]->date_end}}" name="date_end_update" readonly>
                </div>

                <div class="input-box">
                    <label for="user_id_update">User ID#:</label>
                    <input id="user_id_update" value="{{$data[0]->user_id}}"name="user_id_update" readonly>
                </div>
                
                <div class="input-box">
                    <label for="name_update">Name:</label>
                    <input id="name_update" value="{{$data[0]->user_name}}" name="name_update" readonly>
                </div>

                <div class="input-box">
                    <label for="username_update">Username:</label>
                    <input id="username_update" value="{{$data[0]->user_username}}" name="username_update" readonly>
                </div>

                <div class="input-box">
                    <label for="address_update">Address:</label>
                    <textarea id="address_update" value="{{$data[0]->address}}" name="address_update" rows="5" cols="27" readonly></textarea>
                </div>
            </div>
            <div class="info-third-column info-column">
                <div class="input-box">
                    <label for="salary_update">Salary:</label>
                    <input id="salary_update" name="salary_update" readonly>
                </div>
                <div class="input-box">
                    <label for="deductions_update">Deductions/ Not Earned:</label>
                    <input id="deductions_update" name="deductions_update" readonly>
                </div>
                <div class="input-box">
                    <label for="total_update">Total:</label>
                    <input id="total_update" name="total_update" readonly>
                </div>
                
                <div class="input-box payroll_id">
                    <input id="payroll_id_update" value="{{$data[0]->payroll_id}}" name="payroll_id_update" readonly>
                    <input id="attendance_update" value ="{{ $data[0]->dtrs ?? 0 }}" name="attendance_update" readonly>
                    <input id="rate_update" value="{{$data[0]->rate}}" name="rate_update" readonly>
                </div>
                <button type="submit" class="btn btn-success update">Update</button>
            </div>
        </form>
    </div>
@endsection