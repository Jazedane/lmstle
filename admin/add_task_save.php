<?php
include 'session.php';
require 'opener_db.php';
$conn = $connector->databaseConnector();

$name = $_POST['name'];
$filedesc = $_POST['desc'];
$total_points = $_POST['total_points'];
$grade_category_id = $_POST['grade_category_id'];
$end_date = $_POST['end_date'];
$parse_end_date = date('Y-m-d h:i:sa',strtotime($end_date));
$id = $_POST['selector'];
$N = count($id);
$name_notification = 'New Activity Added: ' . $name;

for ($i = 0; $i < $N; $i++) {
    mysqli_query(
        $conn,
        "INSERT INTO tbl_task (fdesc,fdatein,fname,total_points,end_date,grade_category_id,teacher_id,class_id) 
        VALUES ('$filedesc',NOW(),'$name','$total_points','$parse_end_date','$grade_category_id','$session_id','$id[$i]')"
    ) or die(mysqli_error());

    ($query = mysqli_query(
        $conn,
        "SELECT * FROM tbl_teacher_class WHERE teacher_class_id = '$id[$i]'"
    )) or die(mysqli_error());

    $row = mysqli_fetch_array($query, 1);
    $class_id = $row['class_id'];

    ($student_query = mysqli_query(
        $conn,
        "SELECT * FROM tbl_student WHERE class_id = '$class_id'"
    )) or die(mysqli_error());

    while ($row = mysqli_fetch_array($student_query)) {
        $student_id = $row['student_id'];

        ($query = mysqli_query(
            $conn,
            "INSERT INTO tbl_notification (broadcaster_id,receiver_id,message,link) 
            VALUES ('$session_id','$student_id','$name_notification','task_student.php?id=" .
                $id[$i] .
                "')"
        )) or die(mysqli_error());
    }
}

?>