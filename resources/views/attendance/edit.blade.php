<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Attendance</title>
    <style>
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
        <h1 class="registrarLbl">Edit Attendance Status</h1>
        
        <div class="form-container">
            <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Display the current student and subject (readonly) -->
                <div>
                    <label for="student_id">Student:</label>
                    <input type="text" id="student_id" value="{{ $attendance->student->name }}" readonly>
                </div>

                <div>
                    <label for="subject_id">Subject:</label>
                    <input type="text" id="subject_id" value="{{ $attendance->subject->name }}" readonly>
                </div>

                <div>
                    <label for="date">Date:</label>
                    <input type="text" id="date" value="{{ $attendance->date }}" readonly>
                </div>

                <!-- Editable Status -->
                <div>
                    <label for="status">Status:</label>
                    <select name="status" id="status" required>
                        <option value="present" {{ $attendance->status == 'present' ? 'selected' : '' }}>Present</option>
                        <option value="absent" {{ $attendance->status == 'absent' ? 'selected' : '' }}>Absent</option>
                        <option value="late" {{ $attendance->status == 'late' ? 'selected' : '' }}>Late</option>
                    </select>
                </div>

                <button type="submit">Update Status</button>
            </form>
        </div>

        <button onclick="window.location='{{ route('teacher.dashboard') }}'" class="back-btn">Back</button>
    </div>
</body>
</html>
