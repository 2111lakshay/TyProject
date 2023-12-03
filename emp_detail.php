<?php
require_once "config.php";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $empName = $_POST['EmpName'];
                    $windowNo = $_POST['window_no'];
                    $date = $_POST['Date'];
                
                    $insertSql = "INSERT INTO rtms.emp_detail (empname, window_no, date) VALUES ('$empName', '$windowNo', '$date')";
                    
                    if ($conn->query($insertSql) === TRUE) {
                        echo "
        <script>
        alert('Data inserted successfully');
        window.location.href='EmpRollDetails.php';
        </script>
    ";
                    } else {
                        echo "Error inserting data: " . $conn->error;
                    }
                
                    // Redirect to another page after successful insertion
                    // header("Location: EmpRollDetails.php");
                    exit();
                }
                ?>