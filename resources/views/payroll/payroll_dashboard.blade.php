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
                    @foreach ($data as $row)
                    <tr>
                        <td scope="row">{{$row["user_id"]}}</th>
                        <td>{{$row["user_name"]}}</td>    
                        <td>{{$row["user_username"]}}</td>
                        <td>{{$row["role"]}}</td>
                        <td>{{$row["position"]}}</td>
                        <td>₱{{$row["rate"]}}</td>
                        <td>{{$row["department"]}}</td>
                        <td>{{$row["date_start"]}}</td>
                        <td>{{$row["date_end"]}}</td>
                        <td class="hidden-columns">{{$row["email"]}}</td>
                        <td class="hidden-columns">{{$row["address"]}}</td>
                        <td class="hidden-columns">{{$row["amount"]}}</td>
                        <td class="hidden-columns">{{$row["deductions"]}}</td>
                        <td class="hidden-columns">{{$row["payroll_id"]}}</td>
                    </tr>
                    @endforeach
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
        <form class="grid-info">
            <div class="info-first-column info-column">
                <div class="input-box">
                    <label for="date_start">Date Start:</label>
                    <input id="date_start" type="date" name="date_start" readonly>
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
                    <label for="email">E-mail:</label>
                    <input id="email" name="email" readonly>
                </div>
            </div>
            <div class="info-second-column info-column">
                <div class="input-box">
                    <label for="date_end">Date End:</label>
                    <input id="date_end" type="date" name="date_end" readonly>
                </div>

                <div class="input-box">
                    <label for="user_id">User ID#:</label>
                    <input id="user_id" name="user-id" readonly>
                </div>
                
                <div class="input-box">
                    <label for="name">Name:</label>
                    <input id="name" name="name" readonly>
                </div>

                <div class="input-box">
                    <label for="username">Username:</label>
                    <input id="username" name="username" readonly>
                </div>

                <div class="input-box">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" rows="5" cols="27" readonly></textarea>
                </div>
            </div>
            <div class="info-third-column info-column">
                <div class="input-box">
                    <label for="salary">Salary:</label>
                    <input id="salary" name="salary" readonly>
                </div>
                <div class="input-box">
                    <label for="deductions">Deductions/ Not Earned:</label>
                    <input id="deductions" name="deductions" readonly>
                </div>
                <div class="input-box">
                    <label for="total">Total:</label>
                    <input id="total" name="total" readonly>
                </div>
                
                <div class="input-box payroll_id">
                    <input id="payroll_id" name="payroll_id" readonly>
                </div>
                @error('user_id')
                    <div class="alert alert-danger">User payroll has already<br>been released</div>
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
            <ul class="function_buttons">
                <a class="btn" id="add_function" href="{{ route('payrolls') }}">Add</a><br>
                <a class="btn" id="update_function">Update</a><br>
                <a class="btn" id="release_function">Release</a><br>
                <a class="btn" onclick="confirmDeletion(event)" id="delete_function">Delete</a>
            </ul>
        </div>
    </div>
@endsection