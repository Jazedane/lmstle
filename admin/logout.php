<?php
include('database.php');
include('session.php');
mysqli_query($conn,"update tbl_teacher_log set logout_Date = NOW() where teacher_id = '$session_id' ")or die(mysqli_error());

session_destroy();
header('location:/lmstlee4/login-page.php'); 
?>