<?php
		include('database.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		$hashedPassword = hash('sha256',$password);

		$query = mysqli_query($conn,"SELECT * FROM tbl_teacher 
		WHERE username='$username' AND password='$hashedPassword' AND teacher_stat = 'ACTIVATED' AND isDeleted = 'false'")or die(mysqli_error());
		$count = mysqli_num_rows($query);
		$row = mysqli_fetch_array($query);

		if ($count > 0){
		
		$_SESSION['id']=$row['teacher_id'];
		
		echo 'true';
		
		mysqli_query($conn,"insert into tbl_teacher_log (username,login_date,teacher_id) values('$username',NOW(),".$row['teacher_id'].")")or die(mysqli_error());
		 }else{ 
		echo 'false';
		}	
				
		?>