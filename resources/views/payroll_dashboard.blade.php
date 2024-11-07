@extends('payroll_layout')

@section('content')
    <div class="grid-container">
        <div class="grid-table">
            <table id="table_list">
                <thead>
                    <th scope="col">Data ID#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Position</th>
                    <th scope="col">Department</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Age</th>
                    <th scope="col">Salary Grade</th>
                    <th scope="col">Employee ID#</th>
                    <th scope="col" class="hidden-columns">Birthdate</th>
                    <th scope="col" class="hidden-columns">Mobile No.</th>
                    <th scope="col" class="hidden-columns">E-mail</th>
                    <th scope="col" class="hidden-columns">Date of Hire</th>
                    <th scope="col" class="hidden-columns">Address</th>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</th>
                        <td>Simone Roy</td>    
                        <td>Abello</td>
                        <td>Detective</td>
                        <td>Police Department</td>
                        <td>Male</td>
                        <td>20</td>
                        <td>10</td>
                        <td>1234146431</td>
                        <td class="hidden-columns">1234146431</td>
                        <td class="hidden-columns">1234146431</td>
                        <td class="hidden-columns">1234146431</td>
                        <td class="hidden-columns">1234146431</td>
                        <td class="hidden-columns">1234146431</td>
                    </tr>
                    @foreach ($names as $name)
                    <tr>
                        <td scope="row">1</th>
                        <td>{{$name["first_name"]}}</td>    
                        <td>{{$name["surname"]}}</td>
                        <td>...</td>
                        <td>... ...</td>
                        <td>.......</td>
                        <td>...</td>
                        <td>...</td>
                        <td>......</td>
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
                    <input id="position" name="position">
                </div>
                
                <div class="input-box">
                    <label for="department">Dept.:</label>
                    <input id="department" name="department">
                </div>
                
                <div class="age-gender">
                    <div class="input-gender">
                        <label for="gender">Gender:</label>
                        <input id="gender" name="gender">
                    </div>
                    <div class="input-age">
                        <label for="age">Age:</label>
                        <input id="age" name="age">
                    </div>
                </div>
                
                <div class="input-box">
                    <label for="fname">First Name:</label>
                    <input id="fname" name="fname">
                </div>
                
                <div class="input-box">
                    <label for="surname">Surname:</label>
                    <input id="surname" name="surname">
                </div>
                
                <div class="input-box">
                    <label for="birthdate">Birthdate:</label>
                    <input id="birthdate" name="birthdate">
                </div>
                
                <div class="input-box">
                    <label for="mobile-no">Mobile No.:</label>
                    <input id="mobile-no" name="mobile-no">
                </div>
                
                <div class="input-box">
                    <label for="email">E-mail:</label>
                    <input id="email" name="email">
                </div>
            </div>
            <div class="info-first-column info-column">
                <div class="input-box">
                    <label for="emp-id">Employee ID#:</label>
                    <input id="emp-id" name="emp-id">
                </div>
                
                <div class="input-box">
                    <label for="salary-gr">Salary Grade:</label>
                    <input id="salary-gr" name="salary-gr">
                </div>
                
                <div class="input-box">
                    <label for="date-of-hire">Date of Hire:</label>
                    <input id="date-of-hire" name="date-of-hire">
                </div>
                
                <div class="input-box">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" rows="8" cols="27"></textarea>
                </div>
            </div>
        </form>
        <div class="search-salary-info">
            <div class="search-box ssi-item">
                <label for="search" class="search-label">Search:</label>
                <input id="search" name="search">
                <button>Search</button>
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