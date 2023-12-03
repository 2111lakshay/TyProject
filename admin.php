<?php

$conn = mysqli_connect('localhost','root','','rtms');

$A_name = $_POST['username'];
$A_password = $_POST['password'];

$result = mysqli_query($conn, "SELECT * FROM `admindetails` WHERE username = '$A_name' AND password = '$A_password' ");

session_start();


if(mysqli_num_rows($result)){

    $_SESSION['admin'] = $A_name ;


    echo "
        <script>
        alert('Login successfully');
        window.location.href='AdminPanel.php';
        </script>
    ";
}
else{
    echo "
    <script>
    alert('Invalid username/password');
    window.location.href='AdminLogin.html';
    </script>
";

}
?>