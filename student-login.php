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
    <title>LMSTLE | Student Login</title>

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
            <form method="post" id="signin_student">
                <div class="text-center h1"><strong>Student</strong></div>
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="signin_student"
                    class="form-signin" method="post">
                    <div class="form-group">
                        <label for="inputIDnumber">ID Number</label>
                        <div class="input-group mb-4">
                            <input type="username" maxlength="7" class="form-control" id="student_id" name="username"
                                placeholder="Enter ID Number" onBlur='addDashes(this)' autocomplete="off" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <div class="input-group mb-4">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-eye toggle-password" toggle="#password"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
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

                    <div class="row">
                        <a href="index.php" class="text-center"><i class="fas fa-arrow-left"></i><b> Back</b></a>
                    </div>
                </form>
            </form>
        </div>
    </div>
    <script LANGUAGE="JavaScript">
    function addDashes(f) {
        f.value = f.value.replace(/\D/g, '');

        f.value = f.value.slice(0, 2) + "-" + f.value.slice(2, 8);
    }
    </script>
    <?php include 'script.php'; 

        if(isset($_POST['login'])) {
                                
          $ip_address= getUSerIpAddr();
          $time = time() - 30;

          $check_attempt = mysqli_fetch_assoc(mysqli_query($db->connection, "SELECT count(*) as total_count from attempt_count where time_count > $time and ip_address= '$ip_address'"));
          $total_count  = $check_attempt['total_count'];

          if($total_count == 3){
    ?>
    <script>
    toastr.warning("Your account has been blocked! Please try after 30 seconds");
    </script>
    <?php
        }
        else{

        $username = clean($_POST['username']);
        $password = clean($_POST['password']);
        $hashedPassword = hash('sha256', $password);

        $query = "SELECT * FROM tbl_student WHERE username='$username' AND password='$hashedPassword' AND isDeleted = 'false'";

        $result = mysqli_query($db->connection, $query);

        if(mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        $_SESSION['id']=$row['student_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $hashedPassword = hash('sha256', $password);

        mysqli_query($db->connection, "DELETE from attempt_count where ip_address = '$ip_address'")
    ?>
    <script type="text/javascript">
    $(document).ready(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000
        });
        $(document).Toasts('create', {
            class: 'bg-success',
            title: 'Login Success',
            subtitle: 'Student',
            body: 'Welcome to Learning Management System for TLE-Agricultural!'
        })
        var delay = 2000;
        setTimeout(function() {
            window.location = 'dashboard.php'
        }, delay);
    });
    </script>
    <?php
        }
        else{
        $total_count++;
        $time_remain = 3 - $total_count;
        $time= time();
                        
        if($time_remain == 0){
             ?>
    <script>
    toastr.warning("Your account has been blocked! Please try after 30 seconds");
    </script>
    <?php
        }
        else{
    ?>
    <script>
    toastr.info("Please enter valid login details.".$time_remain.
        "attempts remaining.");
    </script>
    <?php
        }
        mysqli_query($db->connection, "INSERT INTO attempt_count (ip_address, time_count) VALUES ('$ip_address', '$time')");

    ?>
    <script>
    toastr.error("Login Failed! Please enter valid login details!");
    </script>
    <?php
        }
        }
      }
        function getUSerIpAddr(){
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }else{
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
          }
    ?>
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
</body>

</html>