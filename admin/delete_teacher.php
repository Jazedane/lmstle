<?php
include 'dbcon.php';
if (isset($_POST['delete_teacher']) && isset($_POST['selector'])) {
    $id = $_POST['selector'];
    $N = count($id);
    for ($i = 0; $i < $N; $i++) {
        $result = mysqli_query(
            $conn,
            "UPDATE teacher SET isDeleted=true WHERE teacher_id='$id[$i]'"
        );
    }
    header('location: admin_user.php');
}
?>
