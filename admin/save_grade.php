<?php
include('dbcon.php');

$id = $_POST['id'];
$post_id = $_POST['post_id'];
$get_id = $_POST['get_id'];
$grade = $_POST['grade'];
mysqli_query($conn,"update student_task set grade = '$grade' where student_task_id = '$id'")or die(mysqli_error());
?>
<script>
 window.location = 'view_submit_task.php<?php echo '?id='.$get_id.'&'.'post_id='.$post_id; ?>'; 
</script>