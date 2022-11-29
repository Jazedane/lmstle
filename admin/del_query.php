<?php
require_once('./config/confirmation.php');
	if (isset($_POST['delete'])) {
		 $id = $_POST['id'];

		 $sql = "DELETE FROM `image` WHERE id = $id ";
          $result = mysqli_query($db->connection,$sql);
	}
?>
<script>
    alert("Plant Info Successfully Deleted");
	window.location = 'gallery.php?current_page=1';
</script>