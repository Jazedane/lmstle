<?php include('admin/database.php'); ?>
<?php
$id = $_POST['id'];
mysqli_query($conn,"delete from tbl_message_sent where message_sent_id = '$id'")or die(mysqli_error());
?>

