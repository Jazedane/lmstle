<?php include('database.php'); ?>
<?php
$id = $_POST['id'];
mysqli_query($conn,"delete from tbl_task where task_id = '$id'")or die(mysqli_error());
?>
