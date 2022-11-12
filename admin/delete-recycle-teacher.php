<?php
include 'database.php';
if (isset($_POST['delete_recycle_teacher']) && isset($_POST['selector'])) {
    $id = $_POST['selector'];
    $N = count($id);
    for ($i = 0; $i < $N; $i++) {
        $result = mysqli_query(
            $conn,
            "UPDATE tbl_teacher WHERE teacher_id='$id[$i]'"
        );
    }
    header('location: recycle-teacher.php');
}
?>
