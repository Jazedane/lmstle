<?php
include 'database.php';
include 'session.php';
if (isset($_POST['read'])){
	$id=$_POST['selector'];
	$N = count($id);
	for ($i = 0; $i < $N; $i++) {
        mysqli_query(
            $conn,
            "UPDATE tbl_message SET message_status = 'read' WHERE message_id='$id[$i]'"
        ) or die(mysqli_error());
    }
?>
<script>
window.location = 'message.php';
</script>
<?php
}
?>
