<?php
include('database.php');
include('session.php');

$post_id = $_POST['post_id'];
$get_id = $_POST['get_id'];
$student_id = $_POST['student_id'];
$student_task_id = $_POST['student_task_id'];
$fname = $_POST['fname'];
$feedback = $_POST['feedback'];
$grade = $_POST['grade'];
$task_status = $_POST['task_status'];

$name_notification = 'The Task <b>' . $fname . '</b> has been graded. You received a grade of <b>' . $grade . '</b>.';
echo "INSERT INTO tbl_notification (broadcaster_id,receiver_id,message,link) 
    VALUES ('$session_id','$student_id','$name_notification','submit_task.php?id=".$get_id."&post_id=".$post_id."')";
$query = mysqli_query(
    $conn,
    "INSERT INTO tbl_notification (broadcaster_id,receiver_id,message,link) 
    VALUES ('$session_id','$student_id','$name_notification','submit_task.php?id=".$get_id."&post_id=".$post_id."')"
) or die(mysqli_error());


mysqli_query($conn,"UPDATE tbl_student_task SET fname='$fname',feedback='$feedback',grade='$grade',task_status='$task_status' 
WHERE student_task_id='$student_task_id'")or die(mysqli_error());

?>