<?php
include 'database.php';
if (isset($_POST['delete_student']) && isset($_POST['selector'])) {
    $id = $_POST['selector'];
    $N = count($id);

    for ($i = 0; $i < $N; $i++) {
        mysqli_query($conn, "UPDATE tbl_student SET isDeleted=true WHERE student_id='$id[$i]'");
        
		mysqli_query(
             $conn,
             "UPDATE tbl_teacher_class_student SET isDeleted=true WHERE teacher_class_student_id='$id[$i]'"
         );
    }
}
?>
<script>
    alert("Student Successfully Deleted");
    window.location = 'students.php';
</script>