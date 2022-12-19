<?php

include 'session.php';
//Include database connection details
require 'opener_db.php';
$conn = $connector->databaseConnector();
$errmsg_arr = [];
//Validation error flag
$errflag = false;

$task_id = $_POST['id'];
$name = $_POST['name'];
$get_id = $_POST['get_id'];

$is_update = isset($_GET['is_update']) ? $_GET['is_update'] : false;
$student_task_id = $_POST['student_task_id'];
$task_description = $_POST['task_description'];
//Function to sanitize values received from the form. Prevents SQL injection

if (
    isset($_FILES['uploaded_file']['size']) &&
    $_FILES['uploaded_file']['size'] >= 1048576 * 5
) {
    $errmsg_arr[] = 'file selected exceeds 5MB size limit';
    $errflag = true;
}

//If there are input validations, redirect back to the registration form
if ($errflag) {

    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    ?>

<?php exit();
}
//upload random name/number
$rd2 = mt_rand(1000, 9999) . '_File';

//Check that we have a file
if (
    !empty($_FILES['uploaded_file']) &&
    $_FILES['uploaded_file']['error'] == 0
) {
    //Check if the file is JPEG image and it's size is less than 350Kb
    $filename = basename($_FILES['uploaded_file']['name']);

    $ext = substr($filename, strrpos($filename, '.') + 1);

    if (
        $ext != 'exe' &&
        $_FILES['uploaded_file']['type'] != 'application/x-msdownload'
    ) {
        //Determine the path to which we want to save this file
        //$newname = dirname(__FILE__).'/upload/'.$filename;
        $newname =
            $_SERVER['DOCUMENT_ROOT'] .
            '/lmstlee4/admin/uploads/' .
            $rd2 .
            '_' .
            $filename;
        $name_notification =
            'submit task name' . ' ' . '<b>' . $name . '</b>';

        $relative_file_path = '/lmstlee4/admin/uploads/' . $rd2 . '_' . $filename;

        //Check if the file with the same name is already exists on the server
        if (!file_exists($newname)) {
            //Attempt to move the uploaded file to it's new place
            if (
                move_uploaded_file(
                    $_FILES['uploaded_file']['tmp_name'],
                    $newname
                )
            ) {
                //successful upload
                // echo "It's done! The file has been saved as: ".$newname;
                if ($is_update) {
                    ($qry2 = "UPDATE tbl_student_task SET task_description='$task_description',task_file='$relative_file_path',task_date_upload=NOW(),task_name='$name',task_id='$task_id',student_id='$session_id' WHERE student_task_id='$student_task_id'") or die(mysqli_error($conn));
                } else {
                    ($qry2 = "INSERT INTO tbl_student_task (task_description,task_file,task_date_upload,task_name,task_id,student_id) 
                    VALUES ('$task_description','$relative_file_path',NOW(),'$name','$task_id','$session_id')") or
                        die(mysqli_error());
                }

                ($teacher_class_query = mysqli_query(
                    $conn,
                    "SELECT * FROM tbl_teacher_class WHERE teacher_class_id='$get_id'"
                )) or die(mysqli_error());

                $teacher_class_row = mysqli_fetch_array(
                    $teacher_class_query, 1
                );
                
                $teacher_id = $teacher_class_row['teacher_id'];

                ($query = mysqli_query(
                    $conn,
                    "INSERT INTO tbl_notification 
                    (broadcaster_id,receiver_id,message,link) VALUES ('$session_id','$teacher_id','$name_notification','view_submit_task.php?id=" .$get_id."&post_id=" .$task_id."')"
                )) or die(mysqli_error());
                
                $result2 = $connector->query($qry2);
                if ($result2) {
                    $errmsg_arr[] =
                        'record was saved in the database and the file was uploaded';
                    $errflag = true;
                    if ($errflag) {
                        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                        session_write_close();
                        exit();
                    }
                } else {
                    $errmsg_arr[] =
                        'record was not saved in the database but file was uploaded';
                    $errflag = true;
                    if ($errflag) {

                        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                        session_write_close();
                        }
    }
    }
                        ?>

<?php exit();
    }
    }
    }

mysqli_close();
?>