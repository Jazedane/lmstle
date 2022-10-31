<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Login Page</title>

    <?php include 'header.php'; ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline" style="border:2px solid black">
            <div class="card-header text-center" style="background:green">
                <p href="" class="h1"><i class="fas fa-user-circle"><b>Login</b></i></p>
            </div>
            <div class="card-body">
                <?php include 'title-header.php'; ?>
                <p class="login-box-msg">Login to start your session</p>

                <form action="index.php" method="post">
                    <div class="row" style="margin-left: 40px">
                        <div class="col-5">
                            <a href="student-login.php" id="signin_student" type="submit" class="btn btn-primary btn-block">Student</a>
                        </div>
                        <div class="col-5">
                            <a href="teacher-login.php" id="signin_teacher" type="submit" class="btn btn-primary btn-block">Teacher</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <?php include 'script.php'; ?>
    <script>
    jQuery(document).ready(function() {
        jQuery("#login_form").submit(function(e) {
            e.preventDefault();
            var formData = jQuery(this).serialize();
            $.ajax({
                type: "POST",
                url: "login.php",
                data: formData,
                success: function(html) {
                    if (html == 'true') {
                        $.jGrowl("Loading File Please Wait......", {
                            sticky: true
                        });
                        $.jGrowl("Learning Management System", {
                            header: 'Access Granted'
                        });
                        var delay = 1000;
                        setTimeout(function() {
                            window.location = "admin/dashboard.php"
                        }, delay);
                    } else if (html == 'true_student') {
                        $.jGrowl("Learning Management System", {
                            header: 'Access Granted'
                        });
                        var delay = 1000;
                        setTimeout(function() {
                            window.location = "student_notification.php"
                        }, delay);
                    } else {
                        $.jGrowl("Please Check Your Username and Password", {
                            header: 'Login Failed'
                        });
                    }
                }
            });
            return false;
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#signin_student').tooltip('show');
        $('#signin_student').tooltip('hide');
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#signin_teacher').tooltip('show');
        $('#signin_teacher').tooltip('hide');
    });
    </script>
</body>

</html>