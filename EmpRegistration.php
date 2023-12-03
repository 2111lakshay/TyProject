<?php
session_start();
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empname = $_POST["empname"];
    $empid = $_POST["empid"];
    $username = $_POST["username"];
    $password = $_POST["password"];

   // Hash the password before storing

    $sql = "INSERT INTO `empdetails`(`id`, `empname`, `empid`, `username`, `password`) VALUES ('[value-1]','$empname','$empid','$username','$password')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful, redirect to emplogin page
        header("Location: EmpLogin.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Registration</title>
    <link rel="stylesheet" href="css/style.css" />
    <!-- <link rel="stylesheet" href="css/empregistyle.css" /> -->
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
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    <style>
      body {
        background-color: white;
      }
      .container-fluid {
        background-color: #236ca8;
        background: linear-gradient(
          to right,
          white 0%,
          white 50%,
          rgb(53, 92, 175) 50%,
          rgb(53, 92, 175) 100%
        );
        margin: 30px;
        padding: 295px;
        width: auto;
        height: 100%;
        border: 1px solid black;
        border-radius: 5px;
        box-shadow: 0px 0px 20px 5px rgba(0, 0, 0, 0.966);
      }

      .container {
        margin-top: -39%;
        margin-left: -42%;
      }

      .container img {
        mix-blend-mode: multiply;
      }

      .container1 {
        height: 25rem;
        width: 71rem;
        margin-left: 10%;
        margin-bottom: -100%;
      }

      .card {
        margin-top: -60px;
        margin-left: -5%;
        margin-bottom: 10px;
        width: 400px;
        height: 530px;
        border: 1px solid black;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .card:hover {
        box-shadow: 1px 1px 30px 10px rgba(7, 13, 73, 0.966);
      }

      .input-box {
        position: relative;
        width: 310px;
        margin: 30px 0;
        border-bottom: 2px solid #000000;
      }

      .input-box label {
        position: absolute;
        top: 50%;
        left: 5px;
        transform: translateY(-50%);
        font-size: 1em;
        color: #070707;
        pointer-events: none;
        transition: 0.5s;
      }

      .input-box input:focus ~ label,
      .input-box input:valid ~ label {
        top: -5px;
      }

      .input-box input {
        width: 100%;
        height: 50px;
        background: transparent;
        border: none;
        outline: none;
        font-size: 1em;
        color: #000000;
        padding: 0px 0 5px;
      }

      .input-box .icon {
        position: absolute;
        right: 8px;
        color: #000000;
        font-size: 1.2em;
        line-height: 57px;
      }

      button {
        width: 100%;
        height: 40px;
        background-color: #000000;
        outline: none;
        border-radius: 50px;
        cursor: pointer;
        font-size: 1em;
        color: #fff;
        font-weight: 500;
      }

      .input-box {
        position: relative;
        width: 310px;
        margin: 30px 0;
        border-bottom: 2px solid #000000;
      }

      .input-box label {
        position: absolute;
        top: 50%;
        left: 5px;
        transform: translateY(-50%);
        font-size: 1em;
        color: #070707;
        pointer-events: none;
        transition: 0.5s;
      }

      .input-box input:focus ~ label,
      .input-box input:valid ~ label {
        top: -5px;
      }

      .input-box input {
        width: 100%;
        height: 50px;
        background: transparent;
        border: none;
        outline: none;
        font-size: 1em;
        color: #000000;
        padding: 0px 0 5px;
      }

      .input-box .icon {
        position: absolute;
        right: 8px;
        color: #000000;
        font-size: 1.2em;
        line-height: 57px;
      }

      button {
        width: 100%;
        height: 40px;
        background-color: #000000;
        outline: none;
        border-radius: 50px;
        cursor: pointer;
        font-size: 1em;
        color: #fff;
        font-weight: 500;
      }

      .register-link {
        font-size: 20px;
        color: #000000;
        text-align: center;
        margin: 25px 0 10px;
      }

      .register-link p a {
        color: #000000;
        text-decoration: none;
        font-weight: 600;
      }

      .register-link p a:hover {
        text-decoration: underline;
      }

      .login-container {
        max-width: 300px;
        height: 300px;
        margin: 0 auto;
        margin-top: 100px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 4px;
        mix-blend-mode: multiply;
      }

      .login-container a {
        font-family: "Times New Roman", Times, serif;
        font-size: 20px;
      }
      .login-container:hover {
        box-shadow: 1px 1px 10px 10px rgba(7, 13, 73, 0.966);
      }

      .button-group {
        border: 1px solid black;
        border-radius: 50px;
        display: flex;
        justify-content: center;
        width: 100%;
        align-items: center;
      }

      .button-group a {
        font-size: 20px;
      }

      .button-group a:hover {
        color: #ffffff;
      }

      .button-group:hover {
        background-color: #236ca8;

        color: rgb(var(--bs-green));
        cursor: pointer;
        /* &:active {
          transform: translateY(0.1em);
        } */
        box-shadow: 1px 1px 20px 10px rgba(7, 13, 73, 0.966);
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
        <div class="container1">
          <div class="row justify-content-center">
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <form action="" method="post">
                    <div class="form-group">
                      <h2>Registration</h2>
                      <div class="input-box">
                        <span class="icon"
                          ><ion-icon name="person-outline"></ion-icon
                        ></span>
                        <input type="text" name = "empname" id = "empname" required />
                        <label>Employee Name</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-box">
                        <span class="icon">
                          <ion-icon name="id-card-outline"></ion-icon>
                        </span>
                        <input type="text" name = "empid" id = "empid" required />
                        <label>Employee ID</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-box">
                        <span class="icon"
                          ><ion-icon name="person-outline"></ion-icon
                        ></span>
                        <input type="text" name = "username" id = "username" required />
                        <label>Username</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-box">
                        <span class="icon"
                          ><ion-icon name="lock-closed-outline"></ion-icon
                        ></span>
                        <input type="password" name = "password" id = "password" required />
                        <label>Password</label>
                      </div>
                    </div>
                    <button type="submit" 
                    style="background-color: #000000;
                     outline: none;
                      border-radius: 50px;
                       cursor: pointer;
                        font-size: 1em;
                         color: #fff;
                          font-weight: 500;
                          "
                          >Submit</button>

                   
                    </button>
                    <div class="register-link">
                      <p>
                        Already Have An Account ?
                        <a href="EmpLogin.php">Login</a>
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
    const registrationForm = document.querySelector("#registrationForm");
    registrationForm.addEventListener("submit", function (event) {
        event.preventDefault();
        
        const empname = registrationForm.querySelector('input[name="empname"]').value;
        const empid = registrationForm.querySelector('input[name="empid"]').value;
        const username = registrationForm.querySelector('input[name="username"]').value;
        const password = registrationForm.querySelector('input[name="password"]').value;
        
        // Validate form fields
        if (empname.trim() === "") {
            alert("Please enter Employee Name.");
            return;
        }

        if (empid.trim() === "") {
            alert("Please enter Employee ID.");
            return;
        }

        if (username.trim() === "") {
            alert("Please enter a Username.");
            return;
        }

        if (password.trim() === "") {
            alert("Please enter a Password.");
            return;
        }

        // Submit the form if all fields are valid
        registrationForm.submit();
    });
});
</script>
  </body>
</html>
