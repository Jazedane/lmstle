<?php include('dbcon.php'); ?>
<?php
$id = $_POST['id'];
mysqli_query($conn,"delete from task where task_id = '$id'")or die(mysqli_error());
?>
