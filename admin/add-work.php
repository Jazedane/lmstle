<?php
include('database.php');
include('session.php');
$student_id = $_POST['student_id'];
$task_id = $_POST['task_id'];
$grade = $_POST['grade'];
$total_points = $_POST['total_points'];
$impact = $_POST['impact'];

$query = mysqli_query($conn,"INSERT tbl_student_task SET student_id='$student_id', 
task_id='$task_id', grade='$grade',total_points='$total_points',impact='$impact'")
or die(mysqli_error($conn));

?>