<?php
include 'database.php';

/**
 * Prepare POST values.
 */
$class_id = $_POST['class_id'];
$username = $_POST['username'];
$firstname = strtoupper($_POST['firstname']);
$lastname = strtoupper($_POST['lastname']);
$gender = $_POST['gender'];
$age = $_POST['age'];
$teacher_id = $_POST['teacher_id'];
$hashedPassword = hash('sha256', $lastname . $username);

/**
 * Query teacher_class to get the teacher_class_id.
 */
$query = "SELECT * FROM tbl_teacher_class WHERE teacher_id = '$teacher_id' AND class_id='$class_id';";
$result = mysqli_query($conn, $query);
$row   = mysqli_fetch_assoc($result);
$teacher_class_id = $row['teacher_class_id'];

/**
 * Creat student record.
 */
mysqli_query(
    $conn,
    "INSERT INTO 
    tbl_student 
    (username,firstname,lastname,gender,age,location,class_id,status,password) 
    VALUES 
    ('$username','$firstname','$lastname','$gender','$age','NO-IMAGE-AVAILABLE.jpg','$class_id','Registered','$hashedPassword');"
) or die(mysqli_error());

/**
 * Since the student is new, we don't have the student_id, yet.
 * This retrieves the last auto-incremented ID on the 'student' table
 */
$student_id = mysqli_insert_id($conn);

/**
 * Add foreign key references and entry to 'teacher_class_student' table.
 */
mysqli_query(
    $conn,
    "INSERT INTO 
    tbl_teacher_class_student 
    (teacher_class_id,student_id,teacher_id) 
    VALUES 
    ('$teacher_class_id','$student_id','$teacher_id');"
) or die(mysqli_error());

?>
