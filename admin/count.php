<?php
	$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
	$school_year_query_row = mysqli_fetch_array($school_year_query);
	$school_year = $school_year_query_row['school_year'];
?>

<?php $query_yes = mysqli_query($conn,"select * from teacher_class_student
					LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
					LEFT JOIN class ON class.class_id = teacher_class.class_id 
					LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
					LEFT JOIN teacher ON teacher.teacher_id = teacher_class_student.teacher_id 
					JOIN notification ON notification.teacher_class_id = teacher_class.teacher_class_id 
					where teacher_class_student.student_id = '$session_id' and school_year = '$school_year' and teacher_class_student.isDeleted=false  order by notification.date DESC
					")or die(mysqli_error());
					$count_no = mysqli_num_rows($query_yes);

?>
<?php $query_no = mysqli_query($conn,"select * from notification 
					LEFT JOIN notification_read ON notification_read.notification_id = notification.notification_id
					where notification_read.student_id  = '$session_id'
					")or die(mysqli_error());
					$count_yes = mysqli_num_rows($query_no);
					
?>