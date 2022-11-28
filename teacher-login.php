<?php 

session_start();

 require_once('./config/confirmation.php');
 require_once('./config/functions.php');

  

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Teacher Login</title>

    <?php include 'header.php'; ?>
</head>

<body class="hold-transition login-page" id="login">
    <div class="login-box">
        <form method="post" id="login_form">
            <div class="card card-outline" style="border:2px solid black">
                <div class="card-header text-center" style="background:green">
                    <p class="h1"><b>Teacher</b></p>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Signin to start your session</p>

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="login_form"
                        class="form-signin" method="post">
                        <div class="input-group mb-3">
                            <input type="username" class="form-control" id="username" name="username"
                                placeholder="Username" required>
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
                                <button name="login" type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </div>
                    </form>
                    <div class="mb-0">
                        <a href="register.php" class="text-center">Signup to register</a>
                    </div>
                    <div class="mb-0">
                        <a href="login-page.php" class="text-center">Back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php include 'script.php'; ?>
    <script>
    function handleBackNavigation() {
        window.location.href = '/lmstlee4/login-page.php'
    }

    jQuery(document).ready(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000
        });
        jQuery("#back").click(handleBackNavigation)

        jQuery("#login_form").submit(function(e) {
            e.preventDefault();
            var formData = jQuery(this).serialize();
            $.ajax({
                type: "POST",
                url: "/lmstlee4/admin/login.php",
                data: formData,
                success: function(html) {
                    if (html == 'true') {
                        toastr.success("Welcome to Learning Management System for TLE-Agricultural")
                        var delay = 2000;
                        setTimeout(function() {
                            window.location = 'admin/dashboard.php'
                        }, delay);
                    } else {
                        toastr.warning("Login Failed","Please Check Your Username and Password");
                        var delay = 100;
                    }
                }

            });
            return false;
        });
    });
    </script>
</body>

</html>