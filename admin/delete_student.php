<?php
include 'dbcon.php';
if (isset($_POST['delete_student']) && isset($_POST['selector'])) {
    $id = $_POST['selector'];
    $N = count($id);

    for ($i = 0; $i < $N; $i++) {
        mysqli_query($conn, "UPDATE student SET isDeleted=true WHERE student_id='$id[$i]'");
        
		// May not be needed anymore.
		// mysqli_query(
        //     $conn,
        //     "DELETE FROM teacher_class_student where student_id='$id[$i]'"
        // );
    }
    header('location: students.php');
}
?>
