<?php
include 'database.php';

$id = $_POST['id'];

$query= mysqli_query($conn, "DELETE FROM `tbl_grade_category` WHERE grade_category_id = $id ") or die(mysqli_error());

?>