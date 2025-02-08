<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Attendance</title>
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <style>
        /* Keep your existing styles */
        body {
            position: relative;
            background-image: url('../images/bg.png');
            background-repeat: no-repeat;
            background-size: cover;
            width: 100vw;
            height: 100vh;
            margin: 0;
            font-family: "Tiro Tamil", serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .rec_dashboard {
            background-image: url('../images/rec.png');
            background-repeat: no-repeat;
            background-size: cover;
            width: 80%;
            max-width: 1200px;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .logoDashboard {
            background-image: url('../images/logo.png');
            background-repeat: no-repeat;
            background-size: contain;
            width: 150px;
            height: 150px;
            margin-bottom: 20px;
        }

        .registrarLbl {
            text-align: center;
            font-size: 40px;
            color: white;
            margin-bottom: 30px;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .form-container label {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
            display: block;
        }

        .form-container select,
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .form-container button {
            background-color: #BDCB95;
            color: black;
            padding: 12px 25px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin: 10px 0;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%;
        }

        .form-container button:hover {
            background-color: #1E3A32;
            color: white;
        }

        .back-btn {
            background-color: #A87979;
            color: white;
            padding: 8px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s;
            position: absolute;
            bottom: 20px;
            left: 20px;
        }

        .back-btn:hover {
            background-color: #5c3e3e;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .rec_dashboard {
                width: 95%;
                padding: 20px;
            }

            .registrarLbl {
                font-size: 30px;
            }

            .form-container {
                padding: 20px;
            }

            .form-container select,
            .form-container input {
                font-size: 14px;
            }

            .form-container button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="rec_dashboard">
        <div class="logoDashboard"></div>
        <h1 class="registrarLbl">Add Attendance</h1>
        
        <div class="form-container">
            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger" style="background-color: #ffdddd; padding: 10px; border-radius: 5px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('attendance.store') }}" method="POST">
                @csrf
                <div>
                    <label for="student_id">Student:</label>
                    <select class="searchable-dropdown form-control" id="student_id" name="student_id" required>
                    </select>
                </div>
                <div>
                    <label for="subject_id">Subject:</label>
                    <select name="subject_id" id="subject_id" required>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="date">Date:</label>
                    <input type="date" name="date" id="date" required>
                </div>
                <div>
                    <label for="status">Status:</label>
                    <select name="status" id="status" required>
                        <option value="present">Present</option>
                        <option value="absent">Absent</option>
                        <option value="late">Late</option>
                    </select>
                </div>
                <button type="submit">Save Attendance</button>
            </form>
        </div>

        <button onclick="window.location='{{ route('teacher.dashboard') }}'" class="back-btn">Back</button>
    </div>
    <script>
    $(document).ready(function () {
        $('#student_id').select2({
            ajax: {
                url: '{{ route("attendance.searchUsers") }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term,
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            return { id: item.id, text: item.name };
                        })
                    };
                },
            },
            placeholder: 'Search for a student',
            minimumInputLength: 1
        });
    });
    </script>
</body>
</html>
