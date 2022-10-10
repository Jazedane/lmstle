<?php
include 'session.php';
require 'opener_db.php';

$conn = $connector->DbConnector();
$teacher_class_id = $_POST['teacher_class_id'];
$class_id = $_POST['class_id'];

$name = $_POST['name'];
$filedesc = $_POST['desc'];
$end_date = $_POST['end_date'];
$get_id = $_GET['id'];

$name_notification = 'New Task Added: <b>' . $name . '</b>';

($student_query = mysqli_query(
    $conn,
    "SELECT * FROM student WHERE class_id = '$class_id'"
)) or die(mysqli_error());

while ($row = mysqli_fetch_array($student_query)) {
    $student_id = $row['student_id'];

    ($query = mysqli_query(
        $conn,
        "INSERT INTO notification (broadcaster_id,receiver_id,message,link) VALUES ('$session_id','$student_id','$name_notification','task_student.php?id=" .
            $teacher_class_id .
            "')"
    )) or die(mysqli_error());
}

mysqli_query(
    $conn,
    "INSERT INTO task (fdesc,fdatein,teacher_id,class_id,fname,end_date) 
                VALUES ('$filedesc',NOW(),'$session_id','$teacher_class_id','$name','$end_date')"
) or die(mysqli_error());
?>
<script>
window.location = 'task.php<?php echo '?id=' . $get_id; ?>';
</script>