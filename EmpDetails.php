<?php

session_start();
require_once "config.php"; 

// Fetch employee registration data from empdetails table
$selectEmpDetailsSql = "SELECT * FROM `empdetails`";
$empDetailsResult = $conn->query($selectEmpDetailsSql);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Details</title>

    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
      integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
      integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
      crossorigin="anonymous"
    ></script>
    <style>
      body {
        background-color: #f8f9fa;
        background: linear-gradient(
          to right,
          white 0%,
          white 50%,
          rgb(53, 92, 175) 50%,
          rgb(53, 92, 175) 100%
        );
      }

      .table {
        border: 2px solid black;
        margin: 20px;
        width: 100%;
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
        table-layout: fixed !important;
      }

      tr td {
       
        text-align: center !important ;
        font-weight: 300;
      }
      .btn1 a {
        font-family: "Times New Roman", Times, serif;
        font-weight: 300;
        border: 1px solid;
        width: 30%;
        display: flex;
        justify-content: center;
        margin: -20px 0 0 600%;
        background-color: #000000;
        color: #fff;
      }
      .btn1 a:hover {
        background-color: white;
      }
    </style>
  </head>

  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="logo">
        <img src="images/logo.png" alt="" srcset="" height="80" width="80" />
        <img src="images/logo (3).png" alt="" srcset="" height="80" />
        <div class="btn1">
          <a href="AdminPanel.php" class="btn btn-block">EXIT</a>
        </div>
      </div>
    </nav>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Employee Registration Data</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee Name</th>
                    <th>Employee ID</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through the fetched data and display it in the table
                while ($row = $empDetailsResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['empname'] . "</td>";
                    echo "<td>" . $row['empid'] . "</td>";
                    echo "<td><button class='btn btn-danger btn-sm' onclick='deleteEmployee(" . $row['id'] . ")'>Delete</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        function deleteEmployee(id) {
            if (confirm("Are you sure you want to delete this employee?")) {
                // Redirect or perform AJAX delete operation
                // You can modify this script to perform a delete operation using AJAX
                window.location.href = "delete_employee.php?id=" + id;
            }
        }
    </script>
  </body>
</html>
