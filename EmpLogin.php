<?php
session_start();
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hash the provided password

    $sql = "SELECT empid, empname FROM empdetails WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['empid'] = $row["empid"];
        $_SESSION['empname'] = $row["empname"];

        // Login successful, redirect to RollBoxes.html
        echo "
        <script>
        alert('Login successfully');
        window.location.href='EmpRollBoxes.php';
        </script>
    ";
        
        exit();
    } else {
        echo "
          <script>
            alert('Invalid username/password');
            window.location.href='EmpLogin.php';
          </script>
        ";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Login</title>
    <!-- <link rel="stylesheet" href="css/style.css" /> -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
      integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/empstyle.css" />
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
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    <style>
       .btn1 {
       
        margin: 0 0 0 1100px;
        /* margin: 0 0 -30px 900px; */
      }
      .btn1 a {
        font-family: "Times New Roman", Times, serif;
        font-weight: 300;
        border: 1px solid;
        width: 30%;
        display: flex;
        justify-content: center;
        background-color: #000000;
        color: #fff;
      }
      .btn1 a:hover {
        background-color: white;
      }
    </style>
  </head>

  <body>
    
    <div class="container-fluid">
      
      <div class="container">
        <div class="logo">
          <img src="images/logo.png" alt="" srcset="" height="80" width="80" />
          <img src="images/logo (3).png" alt="" srcset="" height="80" />
        </div>
        <div class="btn1">
        <a
          href="Home.html"
          style="padding-right: 25px; padding-left: 25px"
          class="btn btn-block"
          >EXIT</a
        >
      </div>
        <div class="container1">
          <div class="row justify-content-center">
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <form method="post" action = "">
                    <div class="form-group">
                    <h2 style="text-align: center; font-family: 'Times New Roman', Times, serif">Emp Login</h2>
                      <div class="input-box">
                        <span class="icon"
                          ><ion-icon name="person-outline"></ion-icon
                        ></span>
                        <input
                          type="text"
                          required
                          id="username"
                          name="username"
                        />
                        <label>Username</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-box">
                        <span class="icon"
                          ><ion-icon name="lock-closed-outline"></ion-icon
                        ></span>
                        <input type="password" required id = "password" name="password" />
                        <label>Password</label>
                      </div>
                    </div>

                    <button type="submit">
                      <a
                        
                        style="text-decoration: none; color: #fff"
                        >Submit</a
                      >
                    </button>
                    <div class="register-link">
                      <p>
                        Create Account
                        <a href="EmpRegistration.php">Register</a>
                      </p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const loginForm = document.querySelector(".card1 form");
        loginForm.addEventListener("submit", function (event) {
          event.preventDefault();
          const username = loginForm.querySelector('input[type="text"]').value;
          const password = loginForm.querySelector(
            'input[type="password"]'
          ).value;

          if (username.trim() === "") {
            alert("Please enter a username.");
            return;
          }

          if (password.trim() === "") {
            alert("Please enter a password.");
            return;
          }

          alert("Login successful!");
          window.location.href = "RollBoxes.html";
        });
      });
    </script>
  </body>
</html>
