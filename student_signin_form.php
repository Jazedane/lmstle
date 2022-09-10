			<form method="post" id="signin_student">
			    <div class="card">
			        <div class="card-body">
			            <form id="signin_student" class="form-signin" method="post">
			                <h3 class="form-signin-heading"><i class="fa-solid fa-lock"></i> Login as Student</h3>
			                <div class="form-group">
			                    <input type="text" class="input-block-level" id="student_id" name="username"
			                        placeholder="ID Number" required>
			                </div>

			                <div class="form-group">
			                    <input type="text" class="input-block-level" id="firstname" name="firstname"
			                        placeholder="Firstname" required>
			                </div>

			                <div class="form-group">
			                    <input type="text" class="input-block-level" id="lastname" name="lastname" placeholder="Lastname"
			                        required>
			                </div>

			                <div class="form-group">
			                    <select name="class_id" class="input-block-level span7">
			                        <label>
			                            <option> Section </option>
			                        </label>
			                        <?php
				$query = mysqli_query($conn,"select * from class order by class_name ")or die(mysqli_error());
				while($row = mysqli_fetch_array($query)){
				?>
			                        <option value="<?php  echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
			                        <?php
				}
				?>
			                    </select>
			                </div>

			                <div class="form-group">
			                    <input type="password" class="input-block-level" id="password" name="password"
			                        placeholder="Password" required>
			                </div>

			                <div class="form-group">
			                    <input type="password" class="input-block-level" id="cpassword" name="cpassword"
			                        placeholder="Re-type Password" required>
			                </div>

			                <button id="signin" name="login" class="btn btn-info" type="submit"><i
			                        class="fa-solid fa-sign-in"></i> Login </button>
			                <button onclick="window.location='index.php'" id="btn_login" name="back" class="btn" type="submit"><i
			                        class="fa-solid fa-rotate-backward"></i> Back </button>
			            </form>
			        </div>
			    </div>



			    <script>
			    jQuery(document).ready(function() {
			        jQuery("#signin_student").submit(function(e) {
			            e.preventDefault();

			            var password = jQuery('#password').val();
			            var cpassword = jQuery('#cpassword').val();


			            if (password == cpassword) {
			                var formData = jQuery(this).serialize();
			                $.ajax({
			                    type: "POST",
			                    url: "student_signup.php",
			                    data: formData,
			                    success: function(html) {
			                        if (html == 'true') {
			                            alert("Welcome to Learning Management System")
			                            // $.jGrowl("Welcome to Learning Management System for TLE", { header: 'Login Success' });
			                            var delay = 2000;
			                            setTimeout(function() {
			                                window.location = 'dashboard_student.php'
			                            }, delay);
			                        } else if (html == 'false') {
			                            // $.jGrowl("Student does not found in the database Please Make Sure to Check Your ID Number or Firstname, Lastname and the Section You Belong. ", { header: 'Login Failed' });
			                        }
			                    }


			                });

			            } else {
			                $.jGrowl("Student Not found", {
			                    header: 'Login Failed'
			                });
			            }
			        });
			    });
			    </script>