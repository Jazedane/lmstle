<?php include 'header.php'; ?>
<body>
    <div class="container">
        <div class="row text-center">
            <div class="title_index">
                <?php include 'title_index.php'; ?>
            </div>
            <div class="pull-center">
            </div>
        </div>
    <?php include 'script.php'; ?>
</body>

</html>
<style>
.admin-index-form-size {
    width: 100%;
}

.card {
    width: 40%;
    height: 320px;
    margin: auto;
    border: 2px solid black;
    font-family: 'Georgia';
    background-color: burlywood;
}
</style>

<div class="card">
    <form method="post" id="login_form">
        <div class="card-body text-center">
            <div class="admin-index-form-size">
                <h3 class="form-signin-heading"><i class="fa-solid fa-lock"></i> Sign-Up </h3>
                <form id="login_form" class="form-signin" method="post">

                    <div class="md-3">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname"
                            required>
                    </div>
                    <div class="md-3">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname"
                            required>
                    </div>
                    <div class="md-3">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                            required>
                    </div>

                    <div class="md-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            required>
                    </div>
                    <div class="md-3">
                        <input type="password" class="form-control" id="cpassword" name="cpassword"
                            placeholder="Confirm Password" required>
                    </div>

                    <button id="back" type="button" class="btn btn-danger">
                        <i class="fa-solid fa-arrow-rotate-backward"></i> Back
                    </button>

                    <button id="signup" onclick="window.location='signup_new.php'" type="button"
                        class="btn btn-info">
                        <i class="fa-solid fa-sign-in"></i> Sign-Up
                    </button>

                </form>
            </div>
        </div>
    </form>
</div>

<script>
function handleBackNavigation() {
    window.location.href = '/lmstle/signup_teacher.php'
}

jQuery(document).ready(function() {
    jQuery("#back").click(handleBackNavigation)

    jQuery("#signup_form").submit(function(e) {
        e.preventDefault();
        var formData = jQuery(this).serialize();
        $.ajax({
            type: "POST",
            url: "/lmstle/signup_teacher.php",
            data: formData,
            success: function(html) {
                if (html == 'true') {
                    alert("You Have Been Successfully Signup!")
                    $.jGrowl(
                        "Please Proceed to Login", {
                            header: 'Access Granted'
                        });
                    var delay = 2000;
                    setTimeout(function() {
                        window.location = '/lmstle/signup_teacher.php'
                    }, delay);
                } else {
                    alert("Signup Failed")
                    $.jGrowl("Please Check Your Username and Password", {
                        header: 'Signup Failed'
                    });
                }
            }

        });
        return false;
    });
});
</script>