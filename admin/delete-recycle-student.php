<?php include 'database.php'; 
if (isset($_POST['delete_recycle_student']) && isset($_POST['selector'])) {
    $id = $_POST['selector'];
    $N = count($id);

    for ($i = 0; $i < $N; $i++) {
        mysqli_query($conn, "DELETE FROM tbl_student WHERE student_id='$id[$i]'");
        
		mysqli_query(
             $conn,
             "DELETE FROM tbl_teacher_class_student WHERE teacher_class_student_id='$id[$i]'"
         );
    }
}
?>