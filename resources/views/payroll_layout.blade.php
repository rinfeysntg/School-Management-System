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
    <link rel="stylesheet" href="../css/layout.css">
    <title>Wesleyan University Philippines</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .payroll-container {
            padding: 12px;
            margin: 12px;
        }
        .grid-container {
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
            grid-template-rows: 1fr 1fr 1fr 1fr 1fr;
            display: grid;
            gap: 10px;
        }
        .grid-table {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgb(255, 255, 255);
            height: 500px;
            grid-column-start: 1;
            grid-column-end: 11;
            grid-row-start: 1;
            grid-row-end: 4;
            overflow: scroll;
        }
        table#table_list {
            border-radius: 10px;
            color: black;
            font-size: 20px;
            border-collapse: collapse;
            width: 100%;
        }
        #table_list th {
            background-color: white;
            position: sticky;
            top: 0;
        }
        #table_list td, #table_list th {
            border: 2px solid black;
        }
        tr:hover,
        tr:focus-within {
          background: #8f8f8f;
          outline: none;
        }
        .hidden-columns {
            display:none;
        }
        .grid-slip {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgb(255, 255, 255);
            grid-column-start: 11;
            grid-column-end: 13;
            grid-row-start: 1;
            grid-row-end: 6;
        }
        .payslip-header {
            text-align: center
        }
        .grid-info {
            background-color: rgba(255, 255, 255, 0.8);
            grid-column-start: 1;
            grid-column-end: 6;
            grid-row-start: 4;
            grid-row-end: 6;
            display: flex;
            justify-content: space-between;
        }
        .info-column {
            background-color: rgba(255, 255, 255, 0);
        }
        .age-gender {
            width: 280px;
        }

        .input-gender, .input-age {
        }
        #age, #gender {
            width: 30px;
        }
        .input-box {
            margin: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .age-gender {
            display: flex;
            justify-content: space-around;
        }
        .search-salary-info {
            grid-column-start: 7;
            grid-column-end: 10;
            grid-row-start: 4;
            grid-row-end: 6;
        }
        .ssi-item {
            margin: 10px;
            padding: 10px 0;
        }
        .salary-info {
            background-color: rgba(255, 255, 255, 0.7);
        }
        .payment-info {
            background-color: rgba(255, 255, 255, 0.7);
        }
        .search-label {
            color: white;
            font-weight: bold;
        }
        nav {
            position: sticky;
            bottom: 0;
            overflow: hidden;
            background-color: #333;
            width: 100%;
            display: flex;
            justify-content: space-between;
            height: 10%;
        }
        nav button {
            width: 20%;
        }
    </style>
</head>

<body>
    <div class="payroll-container">
        @yield('content')
    </div>
    <nav class="bottom-nav">
        <button>CREATE</button>
        <button>UPDATE</button>
        <button>DELETE</button>
        <button>RELEASE PAYMENT</button>
        <button>ADD</button>
    </nav>
    <script>
        var table = document.getElementById('table_list'),rIndex;

        for(var i = 0; i < table_list.rows.length; i++)
    {
        table.rows[i].onclick = function()
        {
            rIndex = this.rowIndex;
            document.getElementById("fname").value = this.cells[1].innerHTML;
            document.getElementById("surname").value = this.cells[2].innerHTML;
            document.getElementById("position").value = this.cells[3].innerHTML;
            document.getElementById("department").value = this.cells[4].innerHTML;
            document.getElementById("gender").value = this.cells[5].innerHTML[0];
            document.getElementById("age").value = this.cells[6].innerHTML;
            document.getElementById("salary-gr").value = this.cells[7].innerHTML;
            document.getElementById("emp-id").value = this.cells[8].innerHTML;
            document.getElementById("birthdate").value = this.cells[9].innerHTML;
            document.getElementById("mobile-no").value = this.cells[10].innerHTML;
            document.getElementById("email").value = this.cells[11].innerHTML;
            document.getElementById("date-of-hire").value = this.cells[12].innerHTML;
            document.getElementById("address").value = this.cells[13].innerHTML;
            document.querySelector(".emp-id-ps").value = this.cells[8].innerHTML;
        }
        
    }
    </script>
</body>
</html>