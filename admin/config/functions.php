<?php 
 require_once('./config/operations.php');
	function clean($data) {
		$data = trim($data);
		$data = stripslashes($data);

		return $data;
	}
?>