<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Login Page</title>

    <?php include 'header.php'; ?>
</head>

<body class="hold-transition login-page">
    <div class="container">
        <div class="cover">
            <div class="front">
                <img src="dist/img/index6.jpg" alt="">
                <div class="text">
                    <span class="text-2">
                        <h4><b>Bug-ang National High School</b> (6125) is a DepED Managed
                            partially urban Secondary Public School located in Prk. Pag-asa, Brgy Bug-ang,
                            Toboso, Negros Occidental. It is a Junior High School with Senior High Department.
                        </h4>
                    </span>
                </div>
            </div>
        </div>
        <div class="login-box">
            <div class="text-center h1 mb-3"><i class="fas fa-user-circle"></i> <strong>Login</strong></div>
            <div class="title text-center mb-3">
                <img class="rounded mx-auto d-block" src="/lmstlee4/dist/img/logo.png" style="width:6rem;">
                <h6 style="color:black;font-family:Georgia">
                    <strong>Bug-ang National High School</strong>
                </h6>
                <h6 style="color:black;font-family:Georgia"><p>Prk. Pag-asa, Brgy Bug-ang,
                        Toboso, Negros Occidental</p>
                </h6>

                <h6 style="color:black;font-family:Georgia">
                    <strong>Learning Management System for TLE-Agricultural</strong>
                </h6>
            </div>
            <p class="login-box-msg">Login to start your session</p>

            <form action="index.php" method="post">
                <div class="row" style="margin-left: 40px">
                    <div class="col-5">
                        <a href="student-login.php" id="signin_student" type="submit" data-placement="bottom" title="Login as Student"
                            class="btn btn-primary btn-block">Student</a>
                    </div>
                    <div class="col-5">
                        <a href="teacher-login.php" id="signin_teacher" type="submit" data-placement="bottom" title="Login as Teacher"
                            class="btn btn-primary btn-block">Teacher</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include 'script.php'; ?>
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