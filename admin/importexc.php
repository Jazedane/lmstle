<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "lmstlee4");

use PhpOffice\PhpSpreadsheet\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\xlsx;

if(isset($_POST['import'])){

    $filename = $_FILES["file"]["tmp_name"];
    $file_ext = pathinfo($filename, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if(in_array($file_ext, $allowed_ext)){

        $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($uploadFilePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach ($data as $Row)
        {
            if($count > 0)
            {
                $username = $Row[0];
                $firstname = $Row[1];
                $middlename = $Row[2];
                $lastname = $Row[3];
                $gender = $Row[4];
                $age = $Row[5];

                $student_query = "insert into tbl_student(username,firstname,middlename,lastname,gender,age) values('$username','$firstname',
                '$middlename','$lastname','$gender','$age')";
                $result = mysqli_query($conn, $student_query);
                $msg = true;
            }
            else
            {
            $count = "1";
            }
        }
        if(isset($msg))
        {
            $_SESSION['message'] = "Successfully Imported";
            header("Location: students.php");
            exit(0);
        } 
        else 
        { 
            $_SESSION['message'] = "Failed Imported";
            header("Location: students.php");
            exit(0);
        }
    }
}
?>