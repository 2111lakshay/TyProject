<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Roll Details</title>

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
      .container {
        margin-top: 50px;
      }
      .table tr,
      td,
      th {
        color: #fff;
        border: 2px solid black;
        text-align: center;
        font-family: "Times New Roman", Times, serif;
        text-transform: capitalize;
        background-color: rgb(53, 92, 175);
      }

      .btn1 a {
        font-family: "Times New Roman", Times, serif;
        font-weight: 300;
        border: 1px solid;
        width: 30%;
        display: flex;
        justify-content: center;
        margin: -50px 0 0 150px;
        background-color: #000000;
        color: #fff;
      }
      .btn1 a:hover {
        background-color: white;
      }
      .form {
        margin-left: 10%;
      }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="logo">
        <img src="images/logo.png" alt="" srcset="" height="80" width="80" />
        <img src="images/logo (3).png" alt="" srcset="" height="80" />
      </div>
      <div class="form">
        <form method="POST" action="emp_detail.php">
          <input type="text" name="EmpName" placeholder="EmpName" />
          <input type="text" name="window_no" placeholder="window_no" />
          <input type="date" name="Date" placeholder="Date" />
          <div class="btn">
            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
          </div>
        </form>
      </div>
      <div class="btn1">
        <a
          href="EmpRollBoxes.php"
          style="padding-right: 25px; padding-left: 25px; margin-top: 10px"
          class="btn btn-block"
          >EXIT</a
        >
      </div>
    </nav>
    
      <div class="container table-responsive">
    <table class="table table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th colspan="6">
                    <h5 style="align-items: center">
                        <center>RollBox Data</center>
                    </h5>
                </th>
            </tr>
            <tr>
                <th>Packet No</th>
                <th>Starting No</th>
                <th>End No</th>
                <th>Emp Name</th>
                <th>Window No</th>
                <th>Date</th>
                
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            require_once "config.php";

            // Fetch data from the boxdetail table
            $selectBoxDetailSql = "SELECT packet_no, commencing_no, closing_no FROM rtms.boxdetail";
            $resultBoxDetail = $conn->query($selectBoxDetailSql);

            // Fetch data from the emp_detail table
            $selectEmpDetailSql = "SELECT empname, window_no, date FROM rtms.emp_detail";
            $resultEmpDetail = $conn->query($selectEmpDetailSql);

            while ($rowBoxDetail = $resultBoxDetail->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $rowBoxDetail['packet_no'] . '</td>';
                echo '<td>' . $rowBoxDetail['commencing_no'] . '</td>';
                echo '<td>' . $rowBoxDetail['closing_no'] . '</td>';

                // Fetch corresponding data from emp_detail table
                if ($rowEmpDetail = $resultEmpDetail->fetch_assoc()) {
                    echo '<td>' . $rowEmpDetail['empname'] . '</td>';
                    echo '<td>' . $rowEmpDetail['window_no'] . '</td>';
                    echo '<td>' . $rowEmpDetail['date'] . '</td>';
                    
                } else {
                    // If no corresponding data, add empty cells
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                }

                echo '</tr>';
            }

            // Handle remaining emp_detail data if any
            while ($rowEmpDetail = $resultEmpDetail->fetch_assoc()) {
                echo '<tr>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td>' . $rowEmpDetail['empname'] . '</td>';
                echo '<td>' . $rowEmpDetail['window_no'] . '</td>';
                echo '<td>' . $rowEmpDetail['date'] . '</td>';
                
                echo '</tr>';
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

  </body>
</html>
