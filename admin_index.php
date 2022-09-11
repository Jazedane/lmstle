<style>
.admin-index-form-size {
    width: 100%;
}
</style>
<form method="post" id="login_form">
    <div class="card ">
        <div class="card-body text-center">
            <div class="admin-index-form-size">
                <form id="login_form" class="form-signin" method="post">
                    <h3 class="form-signin-heading"><i class="fa-solid fa-lock"></i> Login as Teacher </h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                            required>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            required>
                    </div>

                    <button name="login" class="btn btn-info" type="submit"><i class="fa-solid fa-sign-in"></i> Login
                    </button>
                    <button onclick="window.location='index.php'" id="btn_login" name="login" class="btn"
                        type="submit"><i class="fa-solid fa-arrow-rotate-backward"></i> Back </button>
                </form>
            </div>
        </div>
    </div>
</form>
<script>
jQuery(document).ready(function() {
    jQuery("#login_form").submit(function(e) {
        e.preventDefault();
        var formData = jQuery(this).serialize();
        $.ajax({
            type: "POST",
            url: "admin/login.php",
            data: formData,
            success: function(html) {
                if (html == 'true') {
                    alert("Welcome to Learning Management System")
                    // $.jGrowl("Welcome to Learning Management System for TLE-Agriculture", { header: 'Access Granted' });
                    var delay = 2000;
                    setTimeout(function() {
                        window.location = 'admin/admin_dashboard.php'
                    }, delay);
                } else {
                    // $.jGrowl("Please Check Your Username and Password", { header: 'Login Failed' });
                }
            }

        });
        return false;
    });
});
</script>