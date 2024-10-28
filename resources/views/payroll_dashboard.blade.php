@extends('payroll_layout')

@section('content')
    <div class="grid-container">
        <div class="grid-table">
            <table class="table-list">
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
            <p>Employee ID:</p>
            <P>Full Name:</p>
            <P>Department:</p>
            <P>Salary:</p>
            <P>Deductions:</p>
            <P>Total Payment:</p>
        </div>
        <form class="grid-info">
            <div class="info-first-column info-column">
                <div class="input-box">
                    <label for="fname">Position:</label>
                    <input id="fname" name="fname">
                </div>
                
                <div class="input-box">
                    <label for="fname">Dept.:</label>
                    <input id="fname" name="fname">
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
                    <label for="fname">Surname:</label>
                    <input id="fname" name="fname">
                </div>
                
                <div class="input-box">
                    <label for="fname">Birthdate:</label>
                    <input id="fname" name="fname">
                </div>
                
                <div class="input-box">
                    <label for="fname">Mobile No.:</label>
                    <input id="fname" name="fname">
                </div>
                
                <div class="input-box">
                    <label for="fname">E-mail:</label>
                    <input id="fname" name="fname">
                </div>
            </div>
            <div class="info-first-column info-column">
                <div class="input-box">
                    <label for="fname">Employee ID#:</label>
                    <input id="fname" name="fname">
                </div>
                
                <div class="input-box">
                    <label for="fname">Salary Grade:</label>
                    <input id="fname" name="fname">
                </div>
                
                <div class="input-box">
                    <label for="fname">Date of Hire:</label>
                    <input id="fname" name="fname">
                </div>
                
                <div class="input-box">
                    <label for="fname">Address:</label>
                    <input id="fname" name="fname">
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