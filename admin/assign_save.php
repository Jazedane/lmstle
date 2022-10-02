<?php
include 'session.php';
require 'opener_db.php';

$conn = $connector->DbConnector();
$teacher_class_id = $_POST['teacher_class_id'];
$class_id = $_POST['class_id'];

$name = $_POST['name'];
$filedesc = $_POST['desc'];
$get_id = $_GET['id'];
$input_name = basename($_FILES['uploaded_file']['name']);
echo $input_name;

if ($input_name == '') {

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
        "INSERT INTO task (fdesc,fdatein,teacher_id,class_id,fname) 
                VALUES ('$filedesc',NOW(),'$session_id','$teacher_class_id','$name')"
    ) or die(mysqli_error());
    ?>
<script>
window.location = 'task.php<?php echo '?id=' . $get_id; ?>';
</script>
<?php
} else {
    $rd2 = mt_rand(1000, 9999) . '_File';
    $filename = basename($_FILES['uploaded_file']['name']);
    $ext = substr($filename, strrpos($filename, '.') + 1);

    $newname = 'uploads/' . $rd2 . '_' . $filename;

    $name_notification = 'New Task Added: <b>' . $name . '</b>';
    move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname);
    
    $file_upload_query = "INSERT INTO task (fdesc,floc,fdatein,teacher_id,class_id,fname) 
                VALUES ('$filedesc','$newname',NOW(),'$session_id','$teacher_class_id','$name')";

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
    ?>
<script>
window.location = 'task.php<?php echo '?id=' . $get_id; ?>';
</script>
<?php
} ?>
