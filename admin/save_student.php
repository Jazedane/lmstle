<?php
include('dbcon.php');

                $student_id = $_POST['student_id'];
                $uname = $_POST['uname'];
                $fname = $_POST['fnane'];
                $lname = $_POST['lname'];
                $class_id = $_POST['class_id'];

               mysqli_query($conn,"insert into student (student_id,username,firstname,lastname,location,class_id,status)
		values ('$student_id''$uname','$fname','$lname','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','Unregistered')                                    
		") or die(mysqli_error()); ?>
<?php    ?>