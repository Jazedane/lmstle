<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Forgot Password</title>

    <?php include 'header.php'; ?>
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline" style="border:2px solid black">
    <div class="card-header text-center" style="background:green">
      <p href="" class="h1"><b>Teacher</b></p>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <form action="recover-password.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="teacher-login.php">Login</a>
      </p>
    </div>
  </div>
</div>
    <?php include 'script.php'; ?>
</body>

</html>