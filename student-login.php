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
    <div class="login-box">
        <form method="post" id="signin_student">
            <div class="card card-outline" style="border:2px solid black">
                <div class="card-header text-center" style="background:green">
                    <p class="h1"><b>Student</b></p>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="signin_student"
                        class="form-signin" method="post">
                        <div class="input-group mb-3">
                            <input type="username" maxlength="7" class="form-control" id="student_id" name="username"
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

                        <div class="mb-0">
                            <a href="login-page.php" class="text-center">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </form>
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
    alert("Your account has been blocked. Please try after 30 seconds");
    </script>
    <?php
                        }
                        else{

                        $username = clean($_POST['username']);
                        $password = clean($_POST['password']);
                        $hashedPassword = hash('sha256', $password);

                       $query = "SELECT * FROM tbl_student WHERE username='$username' AND password='$hashedPassword'";

                        $result = mysqli_query($db->connection, $query);

                        if(mysqli_num_rows($result) > 0) {

                          $row = mysqli_fetch_assoc($result);

                          $_SESSION['id']=$row['student_id'];
                          $_SESSION['username'] = $row['username'];
                          $_SESSION['password'] = $row['password'];
                          $hashedPassword = hash('sha256', $password);

                          mysqli_query($db->connection, "DELETE from attempt_count where ip_address = '$ip_address'");
                          ?>
    <script>
    alert("Welcome to Learning Management System for TLE-Agricultural");
    window.location = 'class_main.php';
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
    alert("Your account has been blocked. Please try after 30 seconds");
    </script>
    <?php
                        }
                        else{
                            ?>
    <script>
    alert("Please enter valid login details.".$time_remain.
        "attempts remaining.");
    </script>
    <?php
                        }
                        mysqli_query($db->connection, "INSERT INTO attempt_count (ip_address, time_count) VALUES ('$ip_address', '$time')");

                       ?>
    <script>
    alert("Login Failed. Please enter valid login details.");
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

</body>

</html>