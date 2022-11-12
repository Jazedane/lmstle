<?php
include 'session.php';
require 'opener_db.php';
$conn = $connector->databaseConnector();

$category_name = $_POST['category_name'];
$impact_percentage = $_POST['impact_percentage'];
$class_id = $_POST['class_id'];
$get_id = $_POST['get_id'];
								
$query = mysqli_query(
    $conn,
    "INSERT INTO tbl_grade_category (category_name,class_id,impact_percentage) 
                VALUES ('$category_name','$class_id','$impact_percentage')"
) or die(mysqli_error($conn));

?>
<script>
window.location = 'grade-category.php<?php echo '?id=' . $get_id; ?>';
</script>