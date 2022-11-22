<?php
include 'database.php';
if (isset($_POST['delete_teacher']) && isset($_POST['selector'])) {
    $id = $_POST['selector'];
    $N = count($id);
    for ($i = 0; $i < $N; $i++) {
        $result = mysqli_query(
            $conn,
            "UPDATE tbl_teacher SET isDeleted=true WHERE teacher_id='$id[$i]'"
        );
    }
}
?>
<script>
    alert("Teacher Successfully Deleted");
    window.location = 'teacher.php';
</script>