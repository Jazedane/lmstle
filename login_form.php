<style>
.user-index-form-size {
    width: 100%;
}

.card-login-form {
    width: 40%;
    margin: auto;
    font-family: 'Georgia';
    margin-top: 50px;
}
</style>

<div class="card card-login-form">
    <div id="button_form" class="form-signin text-center">
        Welcome to BNHS TLE Subject
        <hr>
        <h3 class="form-signin-heading"><i class="fa-solid fa-edit"></i> Login </h3>
        <button data-placement="top" title="Login as Student" id="signin_student"
            onclick="window.location='signup_student.php'" id="btn_student" name="login" class="btn btn-primary"
            type="submit">Student</button>
        <button data-placement="top" title="Login as Teacher" id="signin_teacher"
            onclick="window.location='signup_teacher.php'" name="login" class="btn btn-primary"
            type="submit">Teacher</button>
    </div>
</div>

<script>
jQuery(document).ready(function() {
    jQuery("#login_form").submit(function(e) {
        e.preventDefault();
        var formData = jQuery(this).serialize();
        $.ajax({
            type: "POST",
            url: "login.php",
            data: formData,
            success: function(html) {
                if (html == 'true') {
                    $.jGrowl("Loading File Please Wait......", {
                        sticky: true
                    });
                    $.jGrowl("Learning Management System", {
                        header: 'Access Granted'
                    });
                    var delay = 1000;
                    setTimeout(function() {
                        window.location = "admin/admin_dashboard.php"
                    }, delay);
                } else if (html == 'true_student') {
                    $.jGrowl("Learning Management System", {
                        header: 'Access Granted'
                    });
                    var delay = 1000;
                    setTimeout(function() {
                        window.location = "student_notification.php"
                    }, delay);
                } else {
                    $.jGrowl("Please Check Your Username and Password", {
                        header: 'Login Failed'
                    });
                }
            }
        });
        return false;
    });
});
</script>
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