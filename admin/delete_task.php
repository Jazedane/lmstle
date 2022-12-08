<?php
include 'database.php';

$id = $_POST['id'];
$get_id = $_POST['get_id'];
$student_task_id = $_POST['student_task_id'];

$query= mysqli_query($conn, "UPDATE tbl_task SET isDeleted=true WHERE task_id = '$id'") or die(mysqli_error());

mysqli_query($conn, "UPDATE tbl_student_task SET isDeleted=true WHERE student_task_id = '$student_task_id'") or die(mysqli_error());
?>