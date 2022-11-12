<?php
include 'database.php';
if (isset($_POST['recycle_data_teacher_task']) && isset($_POST['selector'])) {
    $id = $_POST['selector'];
    $N = count($id);
    for ($i = 0; $i < $N; $i++) {
        $result = mysqli_query(
            $conn,
            "UPDATE tbl_task SET isDeleted=false WHERE task_id='$id[$i]'"
        );
    }
    header('location: recycle-teacher-task.php');
}
?>