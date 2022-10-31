					<?php
						$school_year_query = mysqli_query($conn,"select * from tbl_school_year order by school_year DESC")or die(mysqli_error());
						$school_year_query_row = mysqli_fetch_array($school_year_query);
						$school_year = $school_year_query_row['school_year'];
						?>
				
					<?php $query_yes = mysqli_query($conn,"select * from tbl_teacher_notification
					LEFT JOIN tbl_notification_read_teacher on tbl_teacher_notification.teacher_notification_id =  tbl_notification_read_teacher.notification_id
					where teacher_id = '$session_id' 
					")or die(mysqli_error());
					$count_no = mysqli_num_rows($query_yes);
		            ?>
					<?php $query = mysqli_query($conn,"select * from tbl_teacher_notification
					LEFT JOIN tbl_teacher_class on tbl_teacher_class.teacher_class_id = tbl_teacher_notification.teacher_class_id
					LEFT JOIN tbl_student on tbl_student.student_id = tbl_teacher_notification.student_id
					LEFT JOIN tbl_task on tbl_task.task_id = tbl_teacher_notification.task_id 
					LEFT JOIN tbl_class on tbl_teacher_class.class_id = tbl_class.class_id
					LEFT JOIN tbl_subject on tbl_teacher_class.subject_id = tbl_subject.subject_id
					where tbl_teacher_class.teacher_id = '$session_id' 
					")or die(mysqli_error());
					$count = mysqli_num_rows($query);
		            ?>
					
					<?php $not_read = $count -  $count_no; ?>