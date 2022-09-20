<?php
include('session.php');
include('dbcon.php');
if (isset($_POST['read'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"update message set message_status = 'read' where message_id='$id[$i]'");
}
header("location: student_message.php");
}
?>

<?php
if (isset($_POST['reply'])){
$sender_id = $_POST['sender_id'];
$sender_name = $_POST['sender_name'];
$receiver_name = $_POST['receiver_name'];
$my_message = $_POST['my_message'];

mysqli_query($conn,"insert into message (receiver_id,content,date_sended,sender_id,receiver_name,sender_name) 
values('$sender_id','$my_message',NOW(),'$session_id','$sender_name','$receiver_name')")or die(mysqli_error());
mysqli_query($conn,"insert into message_sent (receiver_id,content,date_sended,sender_id,receiver_name,sender_name) 
values('$sender_id','$my_message',NOW(),'$session_id','$sender_name','$receiver_name')")or die(mysqli_error());
?>
<script>
alert('Message Sent');
window.location ="student_message.php";
</script>
<?php

}
?>
