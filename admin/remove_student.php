<?php
include('database.php');
$id = $_POST['id'];
mysqli_query($conn,"delete from tbl_teacher_class_student where teacher_class_student_id = '$id'")or die(mysqli_error());
?>

