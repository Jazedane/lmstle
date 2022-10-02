<?php
include 'session.php';
require 'opener_db.php';
$conn = $connector->DbConnector();

$name = $_POST['name'];
$filedesc = $_POST['desc'];

$input_name = basename($_FILES['uploaded_file']['name']);
echo $input_name;
if ($input_name == '') {
    $id = $_POST['selector'];
    $N = count($id);

	$name_notification = "New Task Added: " . $name;

    for ($i = 0; $i < $N; $i++) {
        mysqli_query(
            $conn,
            "INSERT INTO task (fdesc,fdatein,teacher_id,class_id) VALUES ('$filedesc',NOW(),'$session_id','$id[$i]')"
        ) or die(mysqli_error());
		
		($teacher_class_query = mysqli_query(
			$conn,
			"SELECT * FROM teacher_class WHERE teacher_class_id = '$id[$i]'"
		)) or die(mysqli_error());

		$teacher_class_row = mysqli_fetch_array($teacher_class_query, 1);
		$class_id = $teacher_class_row['class_id'];

        ($student_query = mysqli_query(
			$conn,
			"SELECT * FROM student WHERE class_id = '$class_id'"
		)) or die(mysqli_error());
	
		while ($row = mysqli_fetch_array($student_query)) {
			$student_id = $row['student_id'];
	
			($query = mysqli_query(
				$conn,
				"INSERT INTO notification (broadcaster_id,receiver_id,message,link) VALUES ('$session_id','$student_id','$name_notification','task_student.php?id=" .
					$id[$i] .
					"')"
			)) or die(mysqli_error());
		}
    }
} else {
    $rd2 = mt_rand(1000, 9999) . '_File';
    $filename = basename($_FILES['uploaded_file']['name']);
    $ext = substr($filename, strrpos($filename, '.') + 1);
    $newname = 'admin/uploads/' . $rd2 . '_' . $filename;
    $name_notification = 'Add Task file name' . ' ' . '<b>' . $name . '</b>';
    move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname);
    $id = $_POST['selector'];
    $N = count($id);
    for ($i = 0; $i < $N; $i++) {
        mysqli_query(
            $conn,
            "INSERT INTO task (fdesc,floc,fdatein,teacher_id,fname,class_id) VALUES ('$filedesc','$newname',NOW(),'$session_id','$name','$id[$i]')"
        ) or die(mysqli_error());

		($teacher_class_query = mysqli_query(
			$conn,
			"SELECT * FROM teacher_class WHERE teacher_class_id = '$id[$i]'"
		)) or die(mysqli_error());

		$teacher_class_row = mysqli_fetch_array($teacher_class_query, 1);
		$class_id = $teacher_class_row['class_id'];

        ($student_query = mysqli_query(
			$conn,
			"SELECT * FROM student WHERE class_id = '$class_id'"
		)) or die(mysqli_error());
	
		while ($row = mysqli_fetch_array($student_query)) {
			$student_id = $row['student_id'];
	
			($query = mysqli_query(
				$conn,
				"INSERT INTO notification (broadcaster_id,receiver_id,message,link) VALUES ('$session_id','$student_id','$name_notification','task_student.php?id=" .
					$id[$i] .
					"')"
			)) or die(mysqli_error());
		}
    }
}
?>
