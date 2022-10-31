<?php
include('admin/database.php');
include('session.php');
$sender_id = $_POST['sender_id'];
$sender_name = $_POST['sender_name'];
$receiver_name = $_POST['receiver_name'];
$my_message = $_POST['my_message'];

mysqli_query($conn,"insert into tbl_message (receiver_id,content,date_sended,sender_id,receiver_name,sender_name) 
values('$sender_id','$my_message',NOW(),'$session_id','$sender_name','$receiver_name')")or die(mysqli_error());
mysqli_query($conn,"insert into tbl_message_sent (receiver_id,content,date_sended,sender_id,receiver_name,sender_name) 
values('$sender_id','$my_message',NOW(),'$session_id','$sender_name','$receiver_name')")or die(mysqli_error());
?>