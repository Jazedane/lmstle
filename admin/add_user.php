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
                                   placeholder="Firstname" style="text-transform: uppercase" required>
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <input class="input focused" name="lastname" id="focusedInput" type="text" 
                                   placeholder="Lastname" style="text-transform: uppercase" required>
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <input class="input focused" name="username" id="focusedInput" type="text" 
                                   placeholder="Username" style="text-transform: uppercase" required>
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <input class="input focused" name="password" id="password" type="password" 
                                   placeholder="Password" style="text-transform: uppercase" required>
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


$query = mysqli_query($conn,"select * from teacher where username = '$username'")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
   <script>
alert('Data Already Exist');
   </script>
   <?php
}else{
mysqli_query($conn,"insert into teacher (username,password,firstname,lastname,location) values('$username','$password','$firstname','$lastname','uploads/NO-IMAGE-AVAILABLE.jpg')")or die(mysqli_error());

mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$username','Add User $username')")or die(mysqli_error());
?>
   <script>
window.location = "admin_user.php";
   </script>
   <?php
}
}
?>