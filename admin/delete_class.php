<?php

include 'database.php';

if (isset($_POST['selector'])) {
    $id = $_POST['selector'];
    $N = count($id);

    for ($i = 0; $i < $N; $i++) {
        $result = mysqli_query(
            $conn,
            "UPDATE tbl_class SET isDeleted=true WHERE class_id='$id[$i]'"
        );
    }
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $result = mysqli_query(
        $conn,
        "UPDATE tbl_class SET isDeleted=true WHERE class_id='$id'"
    );
}

?>
<script>
    alert("Class Successfully Deleted");
    window.location = 'class.php';
</script>