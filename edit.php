<?php
include('database.php');
include('session.php');
$student_task_id = $_POST['student_task_id'];
$fname = $_POST['fname'];
$fdesc = $_POST['fdesc'];
$floc = $_POST['floc'];

$query = mysqli_query($conn,"UPDATE tbl_student_task SET fname='$fname',fdesc='$fdesc',floc='$floc' WHERE student_task_id='$student_task_id'")or die(mysqli_error());
?>