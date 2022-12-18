<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Change Password</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>
</head>

<body>
    <?php include 'index.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Change Password</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <?php
                            ($school_year_query = mysqli_query(
                                $conn,
                                'select * from tbl_school_year order by school_year DESC'
                            )) or die(mysqli_error());
                            $school_year_query_row = mysqli_fetch_array(
                                $school_year_query
                            );
                            $school_year =
                                $school_year_query_row['school_year'];
                            ?>
                            <li class="breadcrumb-item"><a href="#"><b>Home</b></a><span class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $school_year_query_row[
                                        'school_year'
                                    ]; ?></a></li>
                            <li class="breadcrumb-item active"><a href="#"><b>Change Password</b></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Change Password</h3>
                            </div>
                            <?php
                            ($query = mysqli_query(
                                $conn,
                                "select * from tbl_teacher where teacher_id = '$session_id'"
                            )) or die(mysqli_error());
                            $row = mysqli_fetch_array($query);
                            ?>
                            <form method="post" id="change_password" class="form-horizontal">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputCurrentPassword">Current Password</label>
                                        <div class="input-group mb-12">
                                            <input type="password" class="form-control" id="current_password"
                                                name="current_password" placeholder="Current Password" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-eye toggle-password float-right"
                                                        toggle="#current_password"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword">New Password</label>
                                        <div class="input-group mb-12">
                                            <input type="password" class="form-control" id="new_password"
                                                name="new_password" placeholder="New Password" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-eye toggle-password1 float-right"
                                                        toggle="#new_password"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="inputPassword">Re-type Password</label>
                                        <div class="input-group mb-12">
                                            <input type="password" class="form-control" id="retype_password"
                                                name="retype_password" placeholder="Re-type Password" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-eye toggle-password2 float-right"
                                                        toggle="#retype_password"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <center><button type="submit" class="btn btn-success">Change</button>
                                        </center>
                                    </div>
                                </div>
                            </form>
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
                            <script>
                            $(".toggle-password2").click(function() {

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
                            jQuery(document).ready(function() {
                                var Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                                jQuery("#change_password").submit(function(e) {
                                    e.preventDefault();

                                    var current_password = jQuery('#current_password').val();
                                    var new_password = jQuery('#new_password').val();
                                    var retype_password = jQuery('#retype_password').val();
                                    if (new_password != retype_password) {
                                        toastr.warning("Change Password Failed",
                                            "New Password does not match with your retyped password"
                                        );
                                    } else {
                                        var formData = jQuery(this).serialize();
                                        $.ajax({
                                            type: "POST",
                                            url: "update_password.php",
                                            data: formData,
                                            success: function(_html) {
                                                const html = _html.trim()
                                                if (html === 'Success') {
                                                    toastr.success(
                                                        "Change Password Success",
                                                        "Your Password is Successfully Change"
                                                    );
                                                    var delay = 1000;
                                                    setTimeout(function() {
                                                        window.location =
                                                            'dashboard.php'
                                                    }, delay);
                                                } else {
                                                    toastr.error("Change Password Failed");
                                                    var delay = 1000;
                                                    setTimeout(function() {
                                                        window.location.reload();
                                                    }, delay);
                                                }
                                            }
                                        });
                                    }
                                });
                            });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>