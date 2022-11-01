<?php
include('database.php');
include('session.php');
$student_task_id = $_POST['student_task_id'];
$fname = $_POST['fname'];
$feedback = $_POST['feedback'];
$task_status = $_POST['task_status'];
$p_condition = $_POST['p_condition'];

$query = mysqli_query($conn,"UPDATE tbl_student_task SET fname='$fname',feedback='$feedback',task_status='$task_status',p_condition='$p_condition' WHERE student_task_id='$student_task_id'")or die(mysqli_error());
?>
<script>
    alert("Edit Task Successfully");
    window.location = 'view_submit_task.php<?php echo '?id='.$get_id ?>&<?php echo 'post_id='.$post_id ?>';

</script>