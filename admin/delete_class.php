<?php

include 'dbcon.php';

if (isset($_POST['selector'])) {
    $id = $_POST['selector'];
    $N = count($id);

    for ($i = 0; $i < $N; $i++) {
        $result = mysqli_query(
            $conn,
            "UPDATE class SET isDeleted=true WHERE class_id='$id[$i]'"
        );
    }

	header('location: class.php');
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $result = mysqli_query(
        $conn,
        "UPDATE class SET isDeleted=true WHERE class_id='$id'"
    );
}

?>
