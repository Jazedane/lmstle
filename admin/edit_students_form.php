   <div class="row-fluid">
       <div class="block">
           <div class="navbar navbar-inner block-header">
               <div class="muted pull-left">Add Student</div>
           </div>
           <div class="block-content collapse in">
               <?php
							$query = mysqli_query($conn,"select * from student LEFT JOIN class ON class.class_id = student.class_id 
                            where student_id = '$get_id' and student.isDeleted=false")or die(mysqli_error());
							$row = mysqli_fetch_array($query);
							?>
               <div class="span12">
                   <form method="post">

                       <div class="control-group">

                           <div class="controls">
                               <select name="cys" class="" style="width:205px" required>
                                   <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?>
                                   </option>
                                   <?php
											$cys_query = mysqli_query($conn,"select * from class order by class_name");
											while($cys_row = mysqli_fetch_array($cys_query)){
											
											?>
                                   <option value="<?php echo $cys_row['class_id']; ?>">
                                       <?php echo $cys_row['class_name']; ?></option>
                                   <?php } ?>
                               </select>
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <input name="username" value="<?php echo $row['username']; ?>" class="input focused"
                                   id="focusedInput" type="number" maxlength="7" placeholder="ID NUMBER" required>
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <input name="firstname" value="<?php echo $row['firstname']; ?>" class="input focused"
                                   id="focusedInput" type="text" placeholder="FIRSTNAME" required>
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <input name="lastname" value="<?php echo $row['lastname']; ?>" class="input focused"
                                   id="focusedInput" type="text" placeholder="LASTNAME" required>
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <select name="gender" class="" style="width:205px" required>
                                   <option><?php echo $row['gender']; ?></option>
                                   <option>MALE</option>
                                   <option>FEMALE</option>
                               </select>
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <input name="age" value="<?php echo $row['age']; ?> class="" id="focusedInput"
                                   type="number" maxlength="2" min="1" max="100" placeholder="AGE" required>
                           </div>
                       </div>

                       <div class="control-group">
                           <div class="controls">
                               <button name="update" class="btn btn-success"><i class="fa-solid fa-save"></i></button>
                               <a href="students.php" class="btn btn-info"><i class="fa-solid fa-add"></i> Add
                                   Student</a>

                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>

   <?php
      if (isset($_POST['update'])) {
                               
      $username = $_POST['username'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $gender = $_POST['gender'];
      $age = $_POST['age'];
      $cys = $_POST['cys'];
                    
mysqli_query($conn,"update student set username = '$username' , firstname ='$firstname' , lastname = '$lastname' , gender = '$gender', age = '$age', class_id = '$cys' where student_id = '$get_id' ") or die(mysqli_error());

		?>

   <script>
window.location = "students.php";
   </script>

   <?php     }  ?>