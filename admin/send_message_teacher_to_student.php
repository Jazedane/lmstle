<?php
include('dbcon.php');
include('session.php');
$student_id = $_POST['student_id'];
$sender_name = $_POST['sender_name'];
$my_message = $_POST['my_message'];


$query = mysqli_query($conn,"select * from student where student_id = '$student_id'")or die(mysqli_error());
$row = mysqli_fetch_array($query);
$name = $row['firstname']." ".$row['lastname'];


mysqli_query($conn,"insert into message (receiver_id,content,date_sended,sender_id,receiver_name,sender_name) 
values('$student_id','$my_message',NOW(),'$session_id','$name','$name1')")or die(mysqli_error());
mysqli_query($conn,"insert into message_sent (receiver_id,content,date_sended,sender_id,receiver_name,sender_name) 
values('$student_id','$my_message',NOW(),'$session_id','$name','$name1')")or die(mysqli_error());
?>