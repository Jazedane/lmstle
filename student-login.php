<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Student Login</title>

    <?php include 'header.php'; ?>
</head>

<body class="hold-transition login-page" id="login">
    <div class="login-box">
        <form method="post" id="signin_student">
            <div class="card card-outline" style="border:2px solid black">
                <div class="card-header text-center" style="background:green">
                    <p class="h1"><b>Student</b></p>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="signin_student" class="form-signin" method="post">
                        <div class="input-group mb-3">
                            <input type="username" maxlength="6" class="form-control" id="student_id" name="username"
                                placeholder="ID Number" onBlur='addDashes(this)' autocomplete="off" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <button id="signin" name="login" type="submit" class="btn btn-primary btn-block">Sign
                                    In</button>
                            </div>
                        </div>

                    <div class="mb-1">
                        <a href="forgot-password-student.php">I forgot my password</a>
                    </div>
                    <div class="mb-0">
                        <a href="login-page.php" class="text-center">Back</a>
                    </div>
                    </form>
                </div>
            </div>
        </form>
    </div>
    <?php include 'script.php'; ?>
    <script LANGUAGE="JavaScript">
        function addDashes(f)
            {
                f.value = f.value.replace(/\D/g, '');

                f.value = f.value.slice(0,2)+"-"+f.value.slice(2,8);
            }
    </script>
    <script>
    jQuery(document).ready(function() {
        jQuery("#signin_student").submit(function(e) {
            e.preventDefault();

            var password = jQuery('#password').val();

            if (password == password) {
                var formData = jQuery(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "student-data.php",
                    data: formData,
                    success: function(html) {
                        if (html == 'true') {
                            alert(
                                "Welcome to Learning Management System for TLE-Agricultural"
                                )
                            var delay = 2000;
                            setTimeout(function() {
                                window.location = 'class_main.php'
                            }, delay);
                        } else if (html == 'false') {
                            alert("Login Failed")
                            $.jGrowl(
                                "Student Not Found, Please Check Your Username and Password ", {
                                    header: 'Login Failed'
                                });
                        }
                    }
                });

            } else {
                $.jGrowl("Student Not Found", {
                    header: 'Login Failed'
                });
            }
        });
    });
    </script>
</body>

</html>