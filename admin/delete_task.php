<?php
include('dbcon.php');
$id = $_POST['id'];
$get_id = $_POST['get_id'];
mysqli_query($conn,"delete from task where task_id = '$id' ")or die(mysqli_error());
?>
<script>
	window.location = 'task.php<?php echo '?id='.$get_id; ?>'
</script>