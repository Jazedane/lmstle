<?php
include('database.php');
include('session.php');
$student_task_id = $_POST['student_task_id'];
$fname = $_POST['fname'];
$feedback = $_POST['feedback'];
$grade = $_POST['grade'];
$task_status = $_POST['task_status'];
$p_condition = $_POST['p_condition'];

$query = mysqli_query($conn,"UPDATE tbl_student_task SET fname='$fname',feedback='$feedback',grade='$grade',task_status='$task_status',p_condition='$p_condition' WHERE student_task_id='$student_task_id'")or die(mysqli_error());
?>
<script>
    alert("Edited Activity Successfully");
    window.location = 'edit_task_modal.php<?php echo '?id='.$get_id ?>&<?php echo 'post_id='.$post_id ?>';
</script>