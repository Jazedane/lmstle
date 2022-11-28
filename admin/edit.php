<?php
include('database.php');
include('session.php');
$student_task_id = $_POST['student_task_id'];
$fname = $_POST['fname'];
$feedback = $_POST['feedback'];
$grade = $_POST['grade'];
$task_status = $_POST['task_status'];

$query = mysqli_query($conn,"UPDATE tbl_student_task SET fname='$fname',feedback='$feedback',grade='$grade',task_status='$task_status' 
WHERE student_task_id='$student_task_id'")or die(mysqli_error());

?>