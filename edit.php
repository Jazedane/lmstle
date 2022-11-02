<?php
include('database.php');
include('session.php');
$student_task_id = $_POST['student_task_id'];
$fname = $_POST['fname'];
$fdesc = $_POST['fdesc'];
$floc = $_POST['floc'];
 echo "UPDATE tbl_student_task SET fname='$fname',fdesc='$fdesc',floc='$floc' WHERE student_task_id='$student_task_id'";
$query = mysqli_query($conn,"UPDATE tbl_student_task SET fname='$fname',fdesc='$fdesc',floc='$floc' WHERE student_task_id='$student_task_id'")or die(mysqli_error());
?>
<script>
    alert("Edited Activity Successfully");
    window.location = 'submit_task.php<?php echo '?id='.$get_id ?>&<?php echo 'post_id='.$post_id ?>';
</script>