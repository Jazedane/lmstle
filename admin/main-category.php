<?php
include 'session.php';
require 'opener_db.php';
$conn = $connector->databaseConnector();

$category_name = $_POST['category_name'];
$impact_percentage = $_POST['impact_percentage'];

$query = mysqli_query(
    $conn,
    "INSERT INTO tbl_grade_category (category_name,impact_percentage) 
                VALUES ('$category_name','$impact_percentage')"
) or die(mysqli_error($conn));

?>
<script>
window.location = 'category-grade.php';
</script>
