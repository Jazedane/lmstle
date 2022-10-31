<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Change Password</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
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
                            $school_year = $school_year_query_row['school_year'];
                            ?>
                            <li class="breadcrumb-item"><a href="#"><b>Home</b></a><span class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $school_year_query_row['school_year']; ?></a></li>
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
                            <form method="post" id="change_password" class="form-horizontal">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputCurrentPassword">Current Password</label>
                                            <input type="hidden" id="password" name="password"
                                                value="<?php echo $row['password']; ?>" placeholder="Current Password">
                                            <input type="password" class="form-control" id="current_password" name="current_password"
                                                placeholder="Current Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword">New Password</label>
                                            <input type="password" class="form-control" id="new_password" name="new_password"
                                                placeholder="New Password" required>
                                    </div>
                                    <!-- Date and time -->
                                    <div class="form-group">
                                        <label class="control-label" for="inputPassword">Re-type Password</label>
                                            <input type="password" class="form-control" id="retype_password" name="retype_password"
                                                placeholder="Re-type Password" required>
                                    </div>
                                    <div class="card-footer">
                                        <center><button type="submit" value="Upload"
                                                class="btn btn-success">Change</button>
                                        </center>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
            jQuery(document).ready(function() {
                jQuery("#change_password").submit(function(e) {
                    e.preventDefault();

                    var password = jQuery('#password').val();
                    var current_password = jQuery('#current_password').val();
                    var new_password = jQuery('#new_password').val();
                    var retype_password = jQuery('#retype_password').val();
                    if (password != current_password) {
                        $.jGrowl(
                            "Password does not match with your current password  ", {
                                header: 'Change Password Failed'
                            });
                    } else if (new_password != retype_password) {
                        $.jGrowl(
                            "Password does not match with your new password  ", {
                                header: 'Change Password Failed'
                            });
                    } else if ((password == current_password) && (new_password ==
                            retype_password)) {
                        var formData = jQuery(this).serialize();
                        $.ajax({
                            type: "POST",
                            url: "update_password.php",
                            data: formData,
                            success: function(html) {

                                $.jGrowl(
                                    "Your password is successfully change", {
                                        header: 'Change Password Success'
                                    });
                                var delay = 2000;
                                setTimeout(function() {
                                    window.location =
                                        'dashboard.php'
                                }, delay);

                            }


                        });

                    }
                });
            });
            </script>
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>
    <script>
    jQuery(document).ready(function($) {
        $("#add_class").submit(function(e) {
            e.preventDefault();
            var _this = $(e.target);
            var formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "add_class_action.php",
                data: formData,
                success: function(html) {
                    if (html == "true") {
                        $.jGrowl("Class Already Exist", {
                            header: 'Add Class Failed'
                        });
                    } else {
                        $.jGrowl("Class Successfully  Added", {
                            header: 'Class Added'
                        });
                        var delay = 500;
                        setTimeout(function() {
                            window.location =
                                'class.php'
                        }, delay);
                    }
                }
            });
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.remove').click(function() {
            var id = $(this).attr("id");
            var name = $(this).attr("name");
            $.ajax({
                type: "POST",
                url: "delete_class.php",
                data: ({
                    id: id
                }),
                cache: false,
                success: function(html) {
                    $("#del" + name).fadeOut('slow', function() {
                        $(this).remove();
                    });
                    $('#' + id).modal('hide');
                    $.jGrowl("Your Class is Successfully Deleted", {
                        header: 'Class Delete'
                    });
                }
            });
            return false;
        });
    });
    </script>
</body>

</html>