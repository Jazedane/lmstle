<?php
	$school_year_query = mysqli_query($conn,"select * from tbl_school_year order by school_year DESC")or die(mysqli_error());
	$school_year_query_row = mysqli_fetch_array($school_year_query);
	$school_year = $school_year_query_row['school_year'];
?>

<?php $query_yes = mysqli_query($conn,"select * from tbl_teacher_class_student
					LEFT JOIN tbl_teacher_class ON tbl_teacher_class.teacher_class_id = tbl_teacher_class_student.teacher_class_id 
					LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id 
					LEFT JOIN tbl_subject ON tbl_subject.subject_id = tbl_teacher_class.subject_id
					LEFT JOIN tbl_teacher ON tbl_teacher.teacher_id = tbl_teacher_class_student.teacher_id 
					JOIN tbl_notification ON tbl_notification.teacher_class_id = tbl_teacher_class.teacher_class_id 
					where tbl_teacher_class_student.student_id = '$session_id' and school_year = '$school_year' and tbl_teacher_class_student.isDeleted=false  order by tbl_notification.date DESC
					")or die(mysqli_error());
					$count_no = mysqli_num_rows($query_yes);

?>
<?php $query_no = mysqli_query($conn,"select * from tbl_notification 
					LEFT JOIN tbl_notification_read ON tbl_notification_read.notification_id = tbl_notification.notification_id
					where tbl_notification_read.student_id  = '$session_id'
					")or die(mysqli_error());
					$count_yes = mysqli_num_rows($query_no);
					
?>