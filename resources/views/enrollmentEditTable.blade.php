<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/registrartable.css') }}">
    <title>Edit Enrollment</title>
</head>

<body>
    <div class="container">
        <div class="glass">
            <div class="frame">
                <div>
                    <h1>Edit Enrollment</h1>
                
                    <form action="{{ route('enrollment.update', $enrollment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                
                        <div>
                            <label for="name">Student:</label>
                            <input type="text" name="name" value="{{ $enrollment->user->name }}" readonly>
                        </div>
                
                        <br>
                
                        <div>
                            <label for="status">Status:</label>
                            <select name="status" required>
                                <option value="Enrolled" {{ $enrollment->status == 'Enrolled' ? 'selected' : '' }}>Enrolled</option>
                                <option value="Not Enrolled" {{ $enrollment->status == 'Not Enrolled' ? 'selected' : '' }}>Not Enrolled</option>
                            </select>
                        </div>
                
                        <br>
                
                        <div class="button-container">
                            <button type="submit">Update Enrollment</button>
                        </div>
                    </form>
                
                    <br>
                
                    <div class="button-container">
                        <a href="{{ route('enrollmentTable') }}"><button>Return</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


