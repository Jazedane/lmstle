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
    <div class="container">
        <div class="cover">
            <div class="front">
                <img src="dist/img/index1.jpg" alt="">
                <div class="text">
                    <span class="text-1">Vision</span>
                    <span class="text-2">
                        <h6>We dream of Filipinos who passionately love their country and whose values
                            and competencies enable them to realize their full potential and contribute meaningfully
                            to building the nation. As a learner-centered public institution, the Department of
                            Education continuously improves itself to better serve its stakeholders.</h6>
                    </span>
                    <span class="text-1">Mission</span>
                    <ul class="text-2">
                        <h6>
                            <p>To protect and promote the right of every Filipino to quality, equitable, culture-based,
                                and complete basic education where:</p>
                            <ul>
                                <li>Students learn in a child-friendly, gender-sensitive, safe and motivating
                                    environment.</li>
                                <li>Teachers facilitate learning and constantly nurture every learner.</li></br>
                                <li>Administrators and staff, as stewards of the institution, ensure an enabling and
                                    supportive environment for effective learning to happen.</li></br>
                                <li>Family, community and other stakeholders are actively engaged and share
                                    responsibility
                                    for developing life-long learners.</li>
                            </ul>
                        </h6>
                    </ul>
                </div>
            </div>
        </div>
        <div class="login-box">
            <form method="post" id="login_form">
                <div class="text-center h1"><strong>Teacher</strong></div>
                <p class="login-box-msg">Signin to start your session</p>

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="login_form" class="form-signin"
                    method="post">
                    <div class="form-group">
                        <label for="inputUsername">Username</label>
                        <div class="input-group mb-3">
                            <input type="username" class="form-control" id="username" name="username"
                                placeholder="Enter Username" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-eye toggle-password" toggle="#password"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button name="login" type="submit" class="btn btn-primary btn-block">Sign
                                In</button>
                        </div>
                    </div>
                </form>
                <div class="text-center mb-1">Don't have an account? <a href="register.php"><b> Signup now<b></a></div>
                <div class="mb-0">
                    <a href="login-page.php" class="text-center"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
            </form>
        </div>
    </div>
    <?php include 'script.php'; ?>
    <script>
    $(".toggle-password").click(function() {

        $(this).toggleClass("far fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    </script>
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
                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'Login Success',
                            subtitle: 'Teacher',
                            body: 'Welcome to Learning Management System for TLE-Agricultural!'
                        })
                        var delay = 1000;
                        setTimeout(function() {
                            window.location = 'admin/dashboard.php'
                        }, delay);
                    } else {
                        toastr.error("Login Failed",
                            "Please Check Your Username and Password");
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