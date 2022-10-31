<?php
include('database.php');
include('session.php');
$student_task_id = $_POST['student_task_id'];
$fname = $_POST['fname'];
$fdesc = $_POST['fdesc'];
$task_status = $_POST['task_status'];
$p_condition = $_POST['p_condition'];

echo "UPDATE tbl_student_task SET fname='$fname',fdesc='$fdesc',task_status='$task_status',p_condition='$p_condition' WHERE student_task_id='$student_task_id'";

$query = mysqli_query($conn,"UPDATE tbl_student_task SET fname='$fname',fdesc='$fdesc',task_status='$task_status',p_condition='$p_condition' WHERE student_task_id='$student_task_id'")or die(mysqli_error());
?>