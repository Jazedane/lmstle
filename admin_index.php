<style>
.admin-index-form-size {
    width: 100%;
}

.card {
    width: 40%;
    margin: auto;
    border: 2px solid black;
    font-family: 'Georgia';
}
</style>

<div class="card">
    <form method="post" id="login_form">
        <div class="card-body text-center">
            <div class="admin-index-form-size">
                <h3 class="form-signin-heading"><i class="fa-solid fa-lock"></i> Login as Teacher </h3>
                <form id="login_form" class="form-signin" method="post">

                    <div class="md-3">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                            required>
                    </div>

                    <div class="md-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            required>
                    </div>

                    <button name="login" class="btn btn-success" type="submit"><i class="fa-solid fa-sign-in"></i> Login
                    </button>

                    <button id="back" type="button" class="btn btn-danger">
                        <i class="fa-solid fa-arrow-rotate-backward"></i> Back
                    </button>
                        
                </form>
            </div>
        </div>
    </form>
</div>

<script>
function handleBackNavigation() {
    window.location.href='/lmstle/index.php'
}

jQuery(document).ready(function() {
    jQuery("#back").click(handleBackNavigation)

    jQuery("#login_form").submit(function(e) {
        e.preventDefault();
        var formData = jQuery(this).serialize();
        $.ajax({
            type: "POST",
            url: "admin/login.php",
            data: formData,
            success: function(html) {
                if (html == 'true') {
                    alert("Welcome to Learning Management System for TLE-Agriculture")
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