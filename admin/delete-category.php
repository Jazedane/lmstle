<?php
require_once('./config/confirmation.php');
	if (isset($_POST['delete_category'])) {
		 $grade_category_id = $_POST['grade_category_id'];

		 $sql = "DELETE FROM `tbl_grade_category` WHERE grade_category_id = $grade_category_id ";
          $result = mysqli_query($db->connection,$sql);
	}
?>
<script>
	window.location = 'category-grade.php'
</script>