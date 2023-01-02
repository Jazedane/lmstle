<?php
include 'database.php';

$id = $_POST['id'];
$get_id = $_POST['get_id'];

$query= mysqli_query($conn, "DELETE FROM `tbl_notification` WHERE notification_id = $id") or die(mysqli_error());

?>