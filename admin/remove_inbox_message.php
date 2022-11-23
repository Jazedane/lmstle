<?php include('database.php'); ?>
<?php
$id = $_POST['id'];
mysqli_query($conn,"DELETE FROM tbl_message WHERE message_id = '$id'")or die(mysqli_error());
?>