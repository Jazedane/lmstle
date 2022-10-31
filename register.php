<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Registration Page</title>

    <?php include 'header.php'; ?>
</head>

<body class="hold-transition register-page" id="signup">
    <div class="register-box">
        <div class="card card-outline" style="border:2px solid black">
            <div class="card-header text-center" style="background:green">
                <p class="h1"><b>Teacher</b></p>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Signup to register</p>

                <form id="login_form" class="form-signin" method="post" action="/lmstlee4/register.php">
                    <input type="hidden" name="action" value="signup" />

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="firstname" placeholder="Firstname" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="lastname" placeholder="Lastname" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="Username" class="form-control" id="username" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-circle"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="cpassword" placeholder="Retype password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="">
                                <a href="teacher-login.php" class="text-center">I already signup</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <button id="signup" type="submit" class="btn btn-primary btn-block">Signup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php 
    if (isset($_POST['action'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = $_POST['password'];

    ($query = mysqli_query(
        $conn,
        "select * from tbl_teacher where username = '$username'"
    )) or die(mysqli_error());
    $count = mysqli_num_rows($query);
    if ($count > 0) { 
    ?>
    <script>
    alert('Data Already Exist');
    </script>

    <?php } else {
        mysqli_query(
            $conn,
            "insert into tbl_teacher (username,password,firstname,lastname,location,teacher_stat) values('$username','$password','$firstname','$lastname','NO-IMAGE-AVAILABLE.jpg','Unactivated')"
        ) or die(mysqli_error());

        mysqli_query(
            $conn,
            "insert into tbl_activity_log (date,username,action) values(NOW(),'$username','Add User $username')"
        ) or die(mysqli_error());
        ?>
    <script>
    window.location = '/lmstlee4/teacher-login.php';
    </script>
    
    <?php }
    } ?>
    <script>
    function handleBackNavigation() {
        window.location.href = '/lmstlee4/teacher-login.php'
    }

    jQuery(document).ready(function() {
        jQuery("#back").click(handleBackNavigation)

        jQuery("#login_form").submit(function(e) {
            e.preventDefault();
            var formData = jQuery(this).serialize();
            $.ajax({
                type: "POST",
                url: "/lmstlee4/register.php",
                data: formData,
                success: function(html) {
                    if (html == 'false') {
                        alert("Signup Failed")
                        $.jGrowl("Please Check Your Username and Password", {
                            header: 'Signup Failed'
                        });
                    } else {
                        alert("You Have Been Successfully Signup!")
                        var delay = 1000;
                        setTimeout(function() {
                            window.location = '/lmstlee4/teacher-login.php'
                        }, delay);
                    }
                }

            });
            return false;
        });
    });
    </script>
</body>
</html>