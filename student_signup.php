<?php
include('dbcon.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn,"select * from student where username='$username'")or die(mysqli_error());
$row = mysqli_fetch_array($query);
$id = $row['student_id'];

$count = mysqli_num_rows($query);
if ($count > 0){
	mysqli_query($conn,"update student set password = '$password', status = 'Registered' where student_id = '$id'")or die(mysqli_error());
	$_SESSION['id']=$id;
	echo 'true';
}else{
echo 'false';
}
?>