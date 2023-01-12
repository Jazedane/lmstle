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
                    <a href="index.php" class="text-center"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
            </form>
        </div>
    </div>
    <?php include 'script.php'; 

        if(isset($_POST['login'])) {
                                
          $ip_address= getUSerIpAddr();
          $time = time() - 30;

          $check_attempt = mysqli_fetch_assoc(mysqli_query($db->connection, "SELECT count(*) as total_count from attempt_count where time_count > $time and ip_address= '$ip_address'"));
          $total_count  = $check_attempt['total_count'];

          if($total_count == 3){
    ?>
    <script>
    toastr.warning("Warning", "Your account has been blocked! Please try after 30 seconds");
    </script>
    <?php
        }
        else{

        $username = clean($_POST['username']);
        $password = clean($_POST['password']);
        $hashedPassword = hash('sha256', $password);

        $query = "SELECT * FROM tbl_teacher WHERE username='$username' AND password='$hashedPassword' AND teacher_stat = 'ACTIVATED' AND isDeleted = 'false'";

        $result = mysqli_query($db->connection, $query);

        if(mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        $_SESSION['id']=$row['teacher_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $hashedPassword = hash('sha256', $password);

        mysqli_query($conn,"INSERT INTO tbl_teacher_log (username,login_date,teacher_id) values('$username',NOW(),".$row['teacher_id'].")");

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
            subtitle: 'Teacher',
            body: 'Welcome to Learning Management System for TLE-Agricultural!'
        })
        var delay = 1000;
        setTimeout(function() {
            window.location = 'admin/dashboard.php'
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
    toastr.warning("Warning", "Your account has been blocked! Please try after 30 seconds");
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