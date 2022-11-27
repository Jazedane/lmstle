<?php 
include 'database.php';

        if (isset($_POST['update_password'])) {

        $password = $_POST['password'];
        $hashedPassword = hash('sha256', $password);
        
        mysqli_query($conn,"UPDATE tbl_student SET password = '$hashedPassword' WHERE student_id = '$get_id' ") or die(mysqli_error());
        }
?>