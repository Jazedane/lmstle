<?php
include('dbcon.php');

                $username = $_POST['username'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $class_id = $_POST['class_id'];
                $hashedPassword = hash('sha256', $lastname . $username);

               mysqli_query($conn,"insert into student (username,firstname,lastname,location,class_id,status,password)
		values ('$username','$firstname','$lastname','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','Unregistered','$hashedPassword')                                    
		") or die(mysqli_error()); 
?>