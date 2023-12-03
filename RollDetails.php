<?php

session_start();
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Roll Details</title>

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
      <form method="POST" action="">
        <input type="text" name="commencing_no" placeholder="commencing_no" minlength="8" maxlength="8" required />
        <input type="text" name="closing_no" placeholder="closing_no" minlength="8" maxlength="8" required />
        <input type="text" name="ipacketNo" placeholder="Initial Packet No" required />
        <div class="btn">
          <button class="btn btn-primary btn-sm" type="submit">Submit</button>
        </div>
      </form>

      </div>
      <div class="btn1">
        <a
          href="AdminPanel.php"
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
            <th colspan="7">
              <h5 style="align-items: center">
                <center>Box no
                  </center>
              </h5>
            </th>
          </tr>
          <tr>
            
            <th>packet no</th>
            <th>commencing no</th>
            <th>closing no</th>
            
           
          </tr>
        </thead>
        <tbody class="table-group-divider">
         <?php
          
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $start = $_POST['commencing_no']; // Get the starting number from user input
                    $end = $_POST['closing_no']; // Get the ending number from user input
                    $ipacket = $_POST['ipacketNo']; // Get the initial packet number from user input
                    $packet = $ipacket - 1;

                    // Create a MySQL connection (Make sure to configure config.php)
                    require_once "config.php";

                    for ($i = 1; $i <= 30; $i++) {
                        $end += 199;
                        $packet++;

                        // Insert data into the database
                        $insertSql = "INSERT INTO rtms.boxdetail (packet_no, commencing_no, closing_no) VALUES ('$packet', '$start', '$end')";

                        if ($conn->query($insertSql) === TRUE) {
                            // Data inserted successfully
                        } else {
                            echo "Error inserting data: " . $conn->error;
                        }

                        echo '<tr>';
                        // echo '<td></td>';
                        echo '<td>' . $packet . '</td>';
                        echo '<td>' . $start . '</td>';
                        echo '<td>' . $end . '</td>';

                        $start = $end + 1;
                        $end += 1;

                        if ($i % 5 == 0) {
                            $start = $start + 1000;
                            $end = $end + 1000;
                        }

                        // echo '<td></td>';
                        // echo '<td></td>';
                        // echo '<td></td>';
                       
                        echo '</tr>';
                    }

                    $conn->close(); // Close the MySQL connection
                }
                
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
