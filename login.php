<?php
include 'database.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$hashedPassword = hash('sha256', $password);
/* student */
$query = "SELECT * FROM tbl_student WHERE username='$username' AND password='$hashedPassword'";
($result = mysqli_query($conn, $query)) or die(mysqli_error());
$row = mysqli_fetch_array($result);
$num_row = mysqli_num_rows($result);

?>