<?php
require_once('./config/confirmation.php');
	if (isset($_POST['delete'])) {
		 $id = $_POST['id'];

		 $sql = "DELETE FROM `image` WHERE id = $id ";
          $result = mysqli_query($db->connection,$sql);

          header("location: gallery.php?page=1");
	}
?>