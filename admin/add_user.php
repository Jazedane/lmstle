   <div class="row-fluid">
       <div class="block">
           <div class="navbar navbar-inner block-header">
               <div class="muted pull-left">Add Teacher</div>
           </div>
           <div class="block-content collapse in">
               <div class="span12">
                   <form method="post">
                       <div class="control-group">
                           <div class="controls">
                               <input class="input focused" name="firstname" id="focusedInput" type="text"
                                   placeholder="Firstname" required>
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <input class="input focused" name="lastname" id="focusedInput" type="text"
                                   placeholder="Lastname" required>
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <input class="input focused" name="username" id="focusedInput" type="text"
                                   placeholder="Username" required>
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <input class="input focused" name="password" id="focusedInput" type="text"
                                   placeholder="Password" required>
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <button name="save" class="btn btn-info"><i class="fa-solid fa-add"></i></button>

                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>

   <?php
if (isset($_POST['save'])){
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$hashedPassword = hash('sha256', $password);


$query = mysqli_query($conn,"select * from teacher where username = '$username'")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
   <script>
alert('Data Already Exist');
   </script>
   <?php
}else{
mysqli_query($conn,"insert into teacher (username,password,firstname,lastname) values('$username','$hashedPassword','$firstname','$lastname')")or die(mysqli_error());

mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$teacher_username','Add User $username')")or die(mysqli_error());
?>
   <script>
window.location = "admin_user.php";
   </script>
   <?php
}
}
?>