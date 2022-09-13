<?php
include 'dbcon.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$hashedPassword = hash('sha256', $password);

($query = mysqli_query(
    $conn,
    "select * from student where username='$username' and password='$hashedPassword'"
)) or die(mysqli_error());

$count = mysqli_num_rows($query);

if ($count > 0) {
    echo 'true';
	$row = mysqli_fetch_array($query);
	$id = $row['student_id'];
	
    mysqli_query(
        $conn,
        "update student set status = 'Registered' where student_id = '$id'"
    ) or die(mysqli_error());
    $_SESSION['id'] = $id;
} else {
    echo 'false';
}
?>
