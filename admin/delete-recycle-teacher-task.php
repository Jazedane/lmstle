<?php
include 'database.php';
if (isset($_POST['delete_recycle_teacher_task']) && isset($_POST['selector'])) {
    $id = $_POST['selector'];
    $N = count($id);
    for ($i = 0; $i < $N; $i++) {
        $result = mysqli_query(
            $conn,
            "DELETE FROM tbl_task WHERE task_id='$id[$i]'"
        );
    }
}
?>