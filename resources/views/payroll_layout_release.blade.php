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
    <link rel="stylesheet" href="../../css/layout.css">
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
            cursor: pointer;
        }
        th:hover,
        th:focus-within {
            cursor: pointer;
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
            grid-column-end: 8;
            grid-row-start: 4;
            grid-row-end: 6;
            display: flex;
            justify-content: space-between;
        }
        .info-column {
            background-color: rgba(255, 255, 255, 0);
        }

        .info-second-column, .info-first-column{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .info-third-column {
            display: flex;
            flex-direction: column;
        }
        .payroll_id, #payroll_id_release, #rate_release, #attendance_release, #payroll_id_release, #rate_release, #attendance_release, .hidden-box, .department_release {
            display: none;
        }
        .track, .update {
            width: 50%;
            margin: 10px 0px 10px 105px;
        }
        .input-box {
            margin: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .function-box {
            grid-column-start: 8;
            grid-column-end: 11;
            grid-row-start: 4;
            grid-row-end: 6;
            text-align: center;
        }
        .ssi-item {
            margin: 10px;
            padding: 10px 0;
        }
        .search-label {
            color: white;
            font-weight: bold;
        }
        .function_buttons {
            margin-top: 25px;
            
        }

        .function_buttons a {
            font-weight: bold;
            width:25%;
            margin: 5px;
            color:black;
            background-color:rgb(255, 255, 255);
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
    <script>
        let payrollData = @json($data);

        function getDaysBetweenDates(date1, date2) {
          const oneDay = 24 * 60 * 60 * 1000; // milliseconds in a day
                
          // Convert dates to milliseconds
          const date1Ms = date1.getTime();
          const date2Ms = date2.getTime();
                
          // Calculate the difference in milliseconds
          const diffMs = Math.abs(date1Ms - date2Ms);
                
          // Convert the difference to days
          return Math.round(diffMs / oneDay);
        }

        let date1 = new Date(document.getElementById("date_start_release").value.toString());
        let date2 = new Date(document.getElementById("date_end_release").value.toString());
        
        let daysDiff = getDaysBetweenDates(date1, date2);
        let fullRate = daysDiff * document.getElementById("rate_release").value;
        let deductions =  (daysDiff - document.getElementById("attendance_release").value) * document.getElementById("rate_release").value;
        let total = fullRate - deductions;

        document.getElementById("salary_release").value = fullRate;
        document.getElementById("deductions_release").value = deductions;
        document.getElementById("total_release").value = total;

        document.getElementById("receipt_release").value = "User ID: " + document.getElementById("user_id_release").value + "\n\n" + "Name: " + document.getElementById("name_release").value + "\n\n" + "Department: " + document.getElementById("department_release").value + "\n\n" + "Salary: " + "₱" + document.getElementById("salary_release").value + "\n\n"+ "Deductions/ Not Earned: " + "₱" + document.getElementById("deductions_release").value + "\n\n"+ "Total: " + "₱" + document.getElementById("total_release").value + "\n\n" ;

        let delete_link = document.getElementById("delete_function");
        let update_link = document.getElementById("update_function");
        var table = document.getElementById('table_list2'),rIndex;

        for(var i = 0; i < table_list.rows.length; i++)
    {
        table.rows[i].onclick = function()
        {
            rIndex = this.rowIndex;
            document.getElementById("user_id").value = this.cells[0].innerHTML;
            document.querySelector(".user_id_ps").innerHTML = this.cells[0].innerHTML;
            document.getElementById("name").value = this.cells[1].innerHTML;
            document.querySelector(".name_ps").innerHTML = this.cells[1].innerHTML;
            document.getElementById("username").value = this.cells[2].innerHTML;
            document.getElementById("role").value = this.cells[3].innerHTML;
            document.getElementById("position").value = this.cells[4].innerHTML;
            document.getElementById("department").value = this.cells[6].innerHTML;
            document.querySelector(".department_ps").innerHTML = this.cells[6].innerHTML;
            document.getElementById("date_start").value = this.cells[7].innerHTML;
            document.getElementById("date_end").value = this.cells[8].innerHTML;
            document.getElementById("email").value = this.cells[9].innerHTML;
            document.getElementById("address").value = this.cells[10].innerHTML;
            document.getElementById("salary").value = this.cells[11].innerHTML;
            document.querySelector(".salary_ps").innerHTML = "P" + this.cells[11].innerHTML;
            document.getElementById("deductions").value = this.cells[12].innerHTML;
            document.querySelector(".deductions_ps").innerHTML = "P" + this.cells[12].innerHTML;
            document.getElementById("total").value = this.cells[11].innerHTML - this.cells[12].innerHTML;
            document.querySelector(".total_ps").innerHTML = "P" + (this.cells[11].innerHTML - this.cells[12].innerHTML).toString();
            document.getElementById("payroll_id").value = this.cells[13].innerHTML;
            delete_link.href='payroll_dashboard/delete/' + this.cells[13].innerHTML;
            update_link.href='payroll_dashboard/edit/' + this.cells[13].innerHTML;
        }
        
    }
        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("table_list");
            switching = true;
            // Set the sorting direction to ascending:
            dir = "asc";
            /* Make a loop that will continue until
            no switching has been done: */
            while (switching) {
              // Start by saying: no switching is done:
              switching = false;
              rows = table.rows;
              /* Loop through all table rows (except the
              first, which contains table headers): */
              for (i = 1; i < (rows.length - 1); i++) {
                // Start by saying there should be no switching:
                shouldSwitch = false;
                /* Get the two elements you want to compare,
                one from current row and one from the next: */
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                /* Check if the two rows should switch place,
                based on the direction, asc or desc: */
                if (dir == "asc") {
                  if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                  }
                } else if (dir == "desc") {
                  if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                  }
                }
              }
              if (shouldSwitch) {
                /* If a switch has been marked, make the switch
                and mark that a switch has been done: */
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                // Each time a switch is done, increase this count by 1:
                switchcount ++;
              } else {
                /* If no switching has been done AND the direction is "asc",
                set the direction to "desc" and run the while loop again. */
                if (switchcount == 0 && dir == "asc") {
                  dir = "desc";
                  switching = true;
                }
              }
            }
        }

        function searchSimilar() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("search");
          filter = input.value.toUpperCase();
          table = document.getElementById("table_list2");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
        }

        function confirmAction(event) {
            // Display the confirmation dialog
            var confirmation = confirm("Confirm action?");
            
            // If the user clicks "Cancel", prevent the form submission
            if (!confirmation) {
                event.preventDefault();
            }
        }
    </script>
</body>
</html>