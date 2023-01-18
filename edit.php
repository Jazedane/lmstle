<?php
include('database.php');
include('session.php');
$student_task_id = $_POST['student_task_id'];
$task_name = $_POST['task_name'];
$task_description = $_POST['task_description'];
$task_file = $_POST['task_file'];

$query = mysqli_query($conn,"UPDATE tbl_student_task SET task_description='$task_description',task_file='$task_file' WHERE student_task_id='$student_task_id'")or die(mysqli_error());
?>