<?php
include 'database.php';

$id = $_POST['id'];

$query= mysqli_query($conn, "DELETE FROM `image` WHERE id = $id ") or die(mysqli_error());

?>