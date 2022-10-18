   <div class="row-fluid">
       <div class="block">
           <div class="navbar navbar-inner block-header">
               <div class="muted pull-left">Edit Teacher</div>
           </div>
           <div class="block-content collapse in">
               <div class="span12">
                   <?php
								$query = mysqli_query($conn,"select * from teacher where teacher_id = '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								?>
                   <form method="post">
                       <div class="control-group">
                           <div class="controls">
                               <input class="input focused" value="<?php echo $row['firstname']; ?>" name="firstname"
                                   id="focusedInput" type="text" placeholder="Firstname" required>
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <input class="input focused" value="<?php echo $row['lastname']; ?>" name="lastname"
                                   id="focusedInput" type="text" placeholder="Lastname" required>
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <input class="input focused" value="<?php echo $row['username']; ?>" name="username"
                                   id="focusedInput" type="text" placeholder="Username" required>
                           </div>
                       </div>



                       <div class="control-group">
                           <div class="controls">
                               <button name="update" class="btn btn-success"><i class="fa-solid fa-save"></i></button>
                               <a href="admin_user.php" class="btn btn-info"><i class="fa-solid fa-add"></i> Add
                                   Teacher</a>

                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
   <?php		
if (isset($_POST['update'])){

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];


mysqli_query($conn,"update teacher set username = '$username'  , firstname = '$firstname' , lastname = '$lastname' where teacher_id = '$get_id' ")or die(mysqli_error());

mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$teacher_username','Edit Teacher $username')")or die(mysqli_error());
?>
   <script>
window.location = "admin_user.php";
   </script>
   <?php
}
?>