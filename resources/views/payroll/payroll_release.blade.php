@extends('payroll_layout_release')

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
            <p>User ID: <span class="user_id_ps">{{$data[0]->user_id}}</span></p>
            <P>Full Name: <span class="name_ps">{{$data[0]->user_name}}</span></p>
            <P>Department: <span class="department_ps">{{$data[0]->department}}</span></p>
            <P>Salary: <span class="salary_ps">{{$data[0]->amount}}</span></p>
            <P>Deductions/Not Earned: <span class="deductions_ps">{{$data[0]->deductions}}</span></p>
            <P>Total Payment: <span class="total_ps"></span></p>
        </div>
        <form onsubmit="confirmAction(event)" action="{{ route('payroll.release', $data[0]->payroll_id) }}"class="grid-info" method="POST">
            @csrf
            <div class="info-first-column info-column">
                <div class="input-box">
                    <label for="date_start_release">Date Start:</label>
                    <input id="date_start_release" value="{{$data[0]->date_start}}" name="date_start_release" readonly>
                </div>
                <div class="input-box">
                    <label for="purpose_release">Purpose:</label>
                    <textarea id="purpose_release" rows="12" cols="27" name="purpose_release" required></textarea>
                </div>
            </div>
            <div class="info-second-column info-column">
                <div class="input-box">
                    <label for="date_end_release">Date End:</label>
                    <input id="date_end_release" value="{{$data[0]->date_end}}" name="date_end_release" readonly>
                </div>
                <div class="hidden-box">
                    <label for="department_release">Date End:</label>
                    <input id="department_release" value="{{$data[0]->department}}" name="department_release" readonly>
                </div>
                <div class="input-box">
                    <label for="receipt_release">Receipt:</label>
                    <textarea id="receipt_release" value="{{$data[0]->address}}" name="receipt_release" rows="12" cols="27" readonly></textarea>
                </div>
            </div>
            <div class="info-third-column info-column">
                <div class="input-box">
                    <label for="user_id_release">User ID#:</label>
                    <input id="user_id_release" value="{{$data[0]->user_id}}"name="user_id_release" readonly>
                </div>
                <div class="input-box">
                    <label for="name_release">Name:</label>
                    <input id="name_release" value="{{$data[0]->user_name}}" name="name_release" readonly>
                </div>
                <div class="input-box">
                    <label for="salary_release">Salary:</label>
                    <input id="salary_release" name="salary_release" readonly>
                </div>
                <div class="input-box">
                    <label for="deductions_release">Deductions/ Not Earned:</label>
                    <input id="deductions_release" name="deductions_release" readonly>
                </div>
                <div class="input-box">
                    <label for="total_release">Total:</label>
                    <input id="total_release" name="total_release" readonly>
                </div>
                
                <div class="input-box payroll_id">
                    <input id="payroll_id_release" value="{{$data[0]->payroll_id}}" name="payroll_id_release" readonly>
                    <input id="attendance_release" value ="{{$data[0]->dtrs}}" name="attendance_release" readonly>
                    <input id="rate_release" value="{{$data[0]->rate}}" name="rate_release" readonly>
                </div>
                <button type="submit" class="btn btn-success update">Release</button>
            </div>
        </form>
    </div>
@endsection