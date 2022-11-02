 <?php
 include('database.php');
 include('session.php');
 $current_password  = $_POST['current_password'];
 $hashed_current_password = hash('sha256', $current_password);
 $new_password  = $_POST['new_password'];
 $hashed_new_password = hash('sha256', $new_password);

 if ($hashed_current_password == $hashed_new_password) {
     echo "New Password cannot be the same as your current password";
 } else {
     $query = mysqli_query($conn, "SELECT * FROM `tbl_student` WHERE `student_id` = '$session_id'") or die(mysqli_error());
     $row = mysqli_fetch_array($query);
     $vpassword = $row['password'];

     if ($hashed_current_password == $vpassword) {
         mysqli_query($conn,"UPDATE tbl_student SET password = '$hashed_new_password' WHERE student_id = '$session_id'")or die(mysqli_error());
         echo "Success";
     } else {
         echo "Current password is incorrect";
     }
 }

 
 ?>