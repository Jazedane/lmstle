<style>
.user-index-form-size {
    width: 70%;
    margin: auto;
}

.card-student-login-form {
    width: 40%;
    margin: auto;
    font-family: 'Georgia';
    border: 2px solid black;
}
</style>

<div class="card-student-login-form">
    <form method="post" id="signin_student">
        <div class="card-body">
            <div class="user-index-form-size">
                <h3 class="form-signin-heading"><i class="fa-solid fa-lock"></i> Login as Student</h3>
                <form id="signin_student" class="form-signin" method="post">

                    <div class="mb-3">
                        <input type="text" class="input-block-level" id="student_id" name="username"
                            placeholder="ID Number" required>
                    </div>

                    <div class="mb-3">
                        <input type="password" class="input-block-level" id="password" name="password"
                            placeholder="Password" required>
                    </div>

                    <button id="signin" name="login" class="btn btn-success" type="submit"><i
                            class="fa-solid fa-sign-in"></i> Login </button>
                    <button onclick="window.location='index.php'" id="btn_login" name="back" class="btn btn-danger"
                        type="button"><i class="fa-solid fa-rotate-backward"></i> Back </button>

                </form>
            </div>
        </div>
    </form>
</div>



<script>
jQuery(document).ready(function() {
    jQuery("#signin_student").submit(function(e) {
        e.preventDefault();

        var password = jQuery('#password').val();

        if (password == password) {
            var formData = jQuery(this).serialize();
            $.ajax({
                type: "POST",
                url: "student_signup.php",
                data: formData,
                success: function(html) {
                    if (html == 'true') {
                        alert("Welcome to Learning Management System for TLE-Agricultural")
                        $.jGrowl("Welcome to Learning Management System for TLE-Agricultural", {
                            header: 'Login Success'
                        });
                        var delay = 2000;
                        setTimeout(function() {
                            window.location = 'dashboard_student.php'
                        }, delay);
                    } else if (html == 'false') {
                        alert("Login Failed")
                        $.jGrowl("Student Not Found, Please Check Your Username and Password ", { header: 'Login Failed' });
                    }
                }
            });

        } else {
            $.jGrowl("Student Not Found", {header: 'Login Failed'});
        }
    });
});
</script>