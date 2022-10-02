<?php
include 'dbcon.php';
include('session.php');

$id = $_POST['id'];
$post_id = $_POST['post_id'];
$get_id = $_POST['get_id'];
$grade = $_POST['grade'];
$student_id = $_POST['student_id'];
$task_name = $_POST['task_name'];

$name_notification = 'The Task <b>' . $task_name . '</b> has been graded. You received a grade of <b>' . $grade . '</b>.';

($query = mysqli_query(
    $conn,
    "INSERT INTO notification (broadcaster_id,receiver_id,message,link) VALUES ('$session_id','$student_id','$name_notification','submit_task.php?id=".$get_id."&post_id=".$post_id."')"
)) or die(mysqli_error());

mysqli_query(
    $conn,
    "update student_task set grade = '$grade' where student_task_id = '$id'"
) or die(mysqli_error());


?>
<script>
 window.location = 'view_submit_task.php<?php echo '?id='.$get_id.'&'.'post_id='.$post_id; ?>'; 
</script>