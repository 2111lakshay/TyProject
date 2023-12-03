<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>

    <link rel="stylesheet" href="css/style.css" />
    <!-- <link rel="stylesheet" href="css/adminpanelstyle.css" /> -->
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
        margin-top: 70px;
        height: 27rem;
        width: 71rem;
        margin-left: 10%;
        margin-bottom: -90%;
      }
      .card {
        margin-left: -5%;
        width: 400px;
        height: 300px;
        border: 1px solid black;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
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

      .btn1 a {
        font-family: "Times New Roman", Times, serif;
        font-weight: 300;
        border: 1px solid;
        width: 10%;
        display: flex;
        justify-content: center;
        margin-left: 170%;
        margin-top: -40px;
        background-color: #000000;
        color: #fff;
      }
      .btn1 a:hover {
        background-color: white;
      }
      
    </style>
  </head>
  <?php
  session_start();
  if( !$_SESSION['admin']){
      header("location:AdminLogin.html");
  }
  ?>  

  <body>
    <div class="container-fluid">
      <div class="container">
        <div class="logo">
          <img src="images/logo.png" alt="" srcset="" height="80" width="80" />
          <img src="images/logo (3).png" alt="" srcset="" height="80" />
          <div class="btn" style="border:2px solid black;width: 20;color: #fff;justify-content: center;">
            <a href="demo.php" class="btn btn-block">Send Email</a>
          </div>
          <div class="btn1">
            <a href="Home.html" class="btn btn-block">EXIT</a>
          </div>
        </div>
        <div class="container1">
          <div class="row justify-content-center">
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h2 class="text-center">Admin Panel</h2>
                  <br />
                  <div class="button-group">
                    <a href="EmpDetails.php" class="btn btn-block"
                      >Emp Details</a
                    >
                  </div>
                  <br />
                  <div class="button-group">
                    <a href="TicketRollDetails.php" class="btn btn-block"
                      >TicketRoll Details</a
                    >
                  </div>
                  <br />
                  <div class="button-group">
                    <a href="RollBoxes.php" class="btn btn-block">AddRollBoxes</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
