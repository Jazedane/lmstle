<?php
include 'database.php';

if (isset($_POST['delete_notif']) && isset($_POST['selector'])) {
    $id = $_POST['selector'];
    $N = count($id);
    for ($i = 0; $i < $N; $i++) 
        $result = mysqli_query(
            $conn,
            "DELETE FROM tbl_notification WHERE notification_id='$id[$i]'"
        );
    }
?>