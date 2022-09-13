<style>
.user-index-form-size {
    width: 100%;
}

.card-student-signin-form {
    width: 40%;
    margin: 0 auto;
    font-family: 'Georgia';
    border: 2px solid black;
}
</style>

<div class="card card-student-signin-form">
    <form method="post" id="signin_student">
        <div class="card-body text-center">
            <div class="user-index-form-size">
                <form id="signin_student" class="form-signin" method="post">
                    <h3 class="form-signin-heading"><i class="fa-solid fa-lock"></i> Login as Student</h3>
                    <div class="form-group">
                        <input type="text" class="input-block-level" id="student_id" name="username"
                            placeholder="ID Number" required>
                    </div>

                    <div class="form-group">
                        <input type="password" class="input-block-level" id="password" name="password"
                            placeholder="Password" required>
                    </div>

                    <button id="signin" name="login" class="btn btn-success" type="submit"><i
                            class="fa-solid fa-sign-in"></i> Login </button>
                    <button onclick="window.location='index.php'" id="btn_login" name="back" class="btn btn-danger"
                        type="submit"><i class="fa-solid fa-rotate-backward"></i> Back </button>
                </form>
            </div>
    </form>
</div>



<script>
jQuery(document).ready(function() {
    jQuery("#signin_student").submit(function(e) {
        e.preventDefault();

        var password = jQuery('#password').val();

        if (password = password) {
            var formData = jQuery(this).serialize();
            $.ajax({
                type: "POST",
                url: "student_signup.php",
                data: formData,
                success: function(html) {
                    if (html == 'true') {
                        alert("Welcome to Learning Management System for TLE-Agriculture")
                        $.jGrowl("Welcome to Learning Management System for TLE", { header: 'Login Success' });
                        var delay = 2000;
                        setTimeout(function() {
                            window.location = 'dashboard_student.php'
                        }, delay);
                    } else if (html == 'false') {
                        alert("Login Failed")
                        // $.jGrowl("Student does not found in the database Please Make Sure to Check Your ID Number or Firstname, Lastname and the Section You Belong. ", { header: 'Login Failed' });
                    }
                }
            });

        } else {
            //$.jGrowl("Student Not found", {header: 'Login Failed'});
        }
    });
});
</script>