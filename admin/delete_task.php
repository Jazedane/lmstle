<?php
include 'database.php';

$id = $_POST['id'];
$get_id = $_POST['get_id'];

mysqli_query($conn, "UPDATE tbl_task SET isDeleted=true WHERE task_id = '$id' ") or die(mysqli_error());
?>

<script>
	window.location = 'task.php<?php echo '?id=' . $get_id; ?>'
</script>