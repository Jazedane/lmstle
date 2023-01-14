<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Registration Page</title>

    <?php include 'header.php'; ?>
    <?php include 'script.php'; ?>
</head>

<body class="hold-transition register-page" id="signup">
    <div class="container1">
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
                            <p>Students learn in a child-friendly, gender-sensitive, safe and motivating
                                environment.</p>
                            <p>Teachers facilitate learning and constantly nurture every learner.</p>
                            <p>Administrators and staff, as stewards of the institution, ensure an enabling and
                                supportive environment for effective learning to happen.</p>
                            <p>Family, community and other stakeholders are actively engaged and share
                                responsibility
                                for developing life-long learners.</p>
                        </h6>
                    </ul>
                </div>
            </div>
        </div>
        <div class="register-box">
            <div class="text-center h1"><strong>Register</strong></div>
            <p class="login-box-msg">Signup to register</p>

            <form id="login_form" class="form-signin" method="post" action="/lmstlee4/register.php">
                <input type="hidden" name="action" value="signup" />
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname"
                        required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname"
                        required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <select name="gender" class="form-control" placeholder="Gender" required>
                        <option selected disabled hidden>Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <input type="Username" class="form-control" id="username" name="username" placeholder="Username"
                        required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-circle"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-eye toggle-password" toggle="#password"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <input type="password" class="form-control" id="cpassword" name="cpassword"
                        placeholder="Retype password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-eye toggle-password1" toggle="#cpassword"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="">
                            <a href="teacher-login.php" class="signup-text"><b>I already signup</b></a>
                        </div>
                    </div>
                    <div class="col-4">
                        <button id="signup" type="submit" class="btn btn-primary btn-block">Signup</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if (isset($_POST['action'])) {
        $firstname = strtoupper($_POST['firstname']);
        $lastname = strtoupper($_POST['lastname']);
        $gender = strtoupper($_POST['gender']);
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = $_POST['password'];
        $hashedPassword = hash('sha256', $password);

        ($query = mysqli_query(
            $conn,
            "select * from tbl_teacher where username = '$username'"
        )) or die(mysqli_error());
        $count = mysqli_num_rows($query);
        if ($count > 0) { 
            
            ?>
    <script>
    toastr.warning("Warning", "Username is already taken.");
    </script>

    <?php } else {
            mysqli_query(
                $conn,
                "insert into tbl_teacher (username,password,firstname,lastname,gender,location,teacher_stat) 
                values('$username','$hashedPassword','$firstname','$lastname','$gender','NO-IMAGE-AVAILABLE.jpg','DEACTIVATED')"
            ) or die(mysqli_error());

            mysqli_query(
                $conn,
                "insert into tbl_activity_log (date,username,action) values(NOW(),'$username','Add User $username')"
            ) or die(mysqli_error());
            ?>

    <script type="text/javascript">
    $(document).ready(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        toastr.success("Signup Success", "You Have Been Successfully Signup! Please Wait for the Confirmation of the Admin for the Activation of Your Account.")
        var delay = 2000;
        setTimeout(function() {
            window.location = '/lmstlee4/teacher-login.php'
        }, delay);
    });
    </script>

    <?php }
    } ?>
    <script>
    function handleBackNavigation() {
        window.location.href = '/lmstlee4/teacher-login.php'
    }

    jQuery(document).ready(function() {
        jQuery("#back").click(handleBackNavigation)
    });
    </script>
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
    $(".toggle-password1").click(function() {

        $(this).toggleClass("far fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    </script>
</body>

</html>