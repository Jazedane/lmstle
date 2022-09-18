<?php
include('dbcon.php');

                $username = $_POST['username'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $class_id = $_POST['class_id'];
                $hashedPassword = hash('sha256', $lastname . $username);
                
mysqli_query($conn,
    "insert into student (username,firstname,lastname,location,class_id,status,password)
	values ('$username','$firstname','$lastname','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','Unregistered','$hashedPassword');"
    ) or die(mysqli_error()); 


mysqli_query($conn,
    "insert into teacher_class_student (teacher_class_id,student_id,teacher_id)
	values ('15','$student_id','1234');"
    ) or die(mysqli_error()); 
?>