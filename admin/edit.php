<?php
include('dbcon.php');
include('session.php');
$task_id = $_POST['id'];
$fname = $_POST['fname'];
$fdesc = $_POST['fdesc'];
$task_status = $_POST['task_status'];
$p_condition = $_POST['p_condition'];

mysqli_query($conn,"insert into task (task_id,fname,fdesc,task_status, p_condition) 
values('$task_id','$fname',NOW(),'$session_id','$fdesc','$task_status')")or die(mysqli_error());
?>