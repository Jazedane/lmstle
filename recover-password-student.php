<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Recover Password Student</title>

    <?php include 'header.php'; ?>
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline" style="border:2px solid black">
    <div class="card-header text-center" style="background:green">
      <p href="" class="h1"><b>Student</b></p>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
      <form action="login-page.php" method="post">
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirm Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="student-login.php">Login</a>
      </p>
    </div>
  </div>
</div>
    <?php include 'script.php'; ?>
</body>

</html>