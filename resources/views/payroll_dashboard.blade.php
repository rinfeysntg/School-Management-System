@extends('payroll_layout')

@section('content')
    <div class="grid-container">
        <div class="grid-table">
            <table class="table-list">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Position</th>
                    <th scope="col">Department</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Age</th>
                    <th scope="col">Salary Grade</th>
                    <th scope="col">ID#</th>
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
                
                <div class="input-box">
                    <label for="gender">Gender:</label>
                    <input id="gender" name="gender">
                    <label for="age">Age:</label>
                    <input id="age" name="age">
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
                    <label for="fname">ID#:</label>
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
    </div>
@endsection