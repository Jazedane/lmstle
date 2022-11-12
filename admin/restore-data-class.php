<?php
include 'database.php';
if (isset($_POST['recycle_data_class']) && isset($_POST['selector'])) {
    $id = $_POST['selector'];
    $N = count($id);
    for ($i = 0; $i < $N; $i++) {
        $result = mysqli_query(
            $conn,
            "UPDATE tbl_class SET isDeleted=false WHERE class_id='$id[$i]'"
        );
    }
    header('location: recycle-class.php');
}
?>
