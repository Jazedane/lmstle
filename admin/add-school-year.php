<?php
include 'database.php';

$school_year = $_POST['school_year'];

mysqli_query(
    $conn,
    "INSERT INTO 
    tbl_school_year
    (school_year) 
    VALUES 
    ('$school_year');"
) or die(mysqli_error());

?>
<script>
    alert("School Year Successfully Added");
    window.location = 'class.php';
</script>