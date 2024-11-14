@extends('payroll_layout')

@section('content')
    <div class="grid-container">
        <div class="grid-table">
            <table id="table_list">
                <thead>
                    <th scope="col" onclick="sortTable(0)">Data ID#</th>
                    <th scope="col" onclick="sortTable(1)">First Name</th>
                    <th scope="col" onclick="sortTable(2)">Surname</th>
                    <th scope="col" onclick="sortTable(3)">Position</th>
                    <th scope="col" onclick="sortTable(4)">Department</th>
                    <th scope="col" onclick="sortTable(5)">Gender</th>
                    <th scope="col" onclick="sortTable(6)">Age</th>
                    <th scope="col" onclick="sortTable(7))">Salary Grade</th>
                    <th scope="col" onclick="sortTable(8)">Employee ID#</th>
                    <th scope="col" class="hidden-columns">Birthdate</th>
                    <th scope="col" class="hidden-columns">Mobile No.</th>
                    <th scope="col" class="hidden-columns">E-mail</th>
                    <th scope="col" class="hidden-columns">Date of Hire</th>
                    <th scope="col" class="hidden-columns">Address</th>
                </thead>
                <tbody id="table_list2">
                    @foreach ($names as $name)
                    <tr>
                        <td scope="row">{{$name["data_id"]}}</th>
                        <td>{{$name["first_name"]}}</td>    
                        <td>{{$name["surname"]}}</td>
                        <td>{{$name["position"]}}</td>
                        <td>{{$name["department"]}}</td>
                        <td>{{$name["gender"]}}</td>
                        <td>{{$name["age"]}}</td>
                        <td>{{$name["salary_grade"]}}</td>
                        <td>{{$name["emp_id"]}}</td>
                        <td class="hidden-columns">{{$name["birthdate"]}}</td>
                        <td class="hidden-columns">{{$name["mobile_no"]}}</td>
                        <td class="hidden-columns">{{$name["email"]}}</td>
                        <td class="hidden-columns">{{$name["date_of_hire"]}}</td>
                        <td class="hidden-columns">{{$name["address"]}}</td>
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
            <p>Employee ID: <span class="emp-id-ps"></span></p>
            <P>Full Name: <span class="fname-ps"></span> <span class="surname-ps"></span></p>
            <P>Department: <span class="department-ps"></span></p>
            <P>Salary:</p>
            <P>Deductions:</p>
            <P>Total Payment:</p>
        </div>
        <form class="grid-info">
            <div class="info-first-column info-column">
                <div class="input-box">
                    <label for="position">Position:</label>
                    <input id="position" name="position" readonly>
                </div>
                
                <div class="input-box">
                    <label for="department">Dept.:</label>
                    <input id="department" name="department" readonly>
                </div>
                
                <div class="age-gender">
                    <div class="input-gender">
                        <label for="gender">Gender:</label>
                        <input id="gender" name="gender" readonly>
                    </div>
                    <div class="input-age">
                        <label for="age">Age:</label>
                        <input id="age" name="age" readonly>
                    </div>
                </div>
                
                <div class="input-box">
                    <label for="fname">First Name:</label>
                    <input id="fname" name="fname" readonly>
                </div>
                
                <div class="input-box">
                    <label for="surname">Surname:</label>
                    <input id="surname" name="surname" readonly>
                </div>
                
                <div class="input-box">
                    <label for="birthdate">Birthdate:</label>
                    <input id="birthdate" name="birthdate" readonly>
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
            <div class="info-first-column info-column">
                <div class="input-box">
                    <label for="emp-id">Employee ID#:</label>
                    <input id="emp-id" name="emp-id" readonly>
                </div>
                
                <div class="input-box">
                    <label for="salary-gr">Salary Grade:</label>
                    <input id="salary-gr" name="salary-gr" readonly>
                </div>
                
                <div class="input-box">
                    <label for="date-of-hire">Date of Hire:</label>
                    <input id="date-of-hire" name="date-of-hire" readonly>
                </div>
                
                <div class="input-box">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" rows="8" cols="27" readonly></textarea>
                </div>
            </div>
        </form>
        <div class="search-salary-info">
            <div class="search-box ssi-item">
                <label for="search" class="search-label">Search:</label>
                <input id="search" name="search" onkeyup="searchSimilar()">
            </div>

            <form class="salary-info ssi-item">
                <div class="input-box">
                    <label for="fname">Salary:</label>
                    <input id="fname" name="fname">
                </div>
                <div class="input-box">
                    <label for="fname">Deductions:</label>
                    <input id="fname" name="fname">
                </div>
                <div class="input-box">
                    <label for="fname">Net Pay:</label>
                    <input id="fname" name="fname">
                </div>
            </form>
            <form class="payment-info ssi-item">
                <div class="input-box">
                    <label for="fname">Last Pay Date:</label>
                    <input id="fname" name="fname">
                </div>
                <div class="input-box">
                    <label for="fname">Next Pay Date:</label>
                    <input id="fname" name="fname">
                </div>
            </form>
        </div>
    </div>
@endsection