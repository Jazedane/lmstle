<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Teacher</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>
    <?php $get_id = $_GET['id']; ?>
</head>

<body>
    <?php include 'index.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Masterlist</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Teacher</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6" id="adduser">
                        <form method="post">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-edit"></i> Edit Teacher</h3>
                                </div>
                                <?php
								$query = mysqli_query($conn,"select * from tbl_teacher where teacher_id = '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>"
                                            class="form-control" style="text-transform: uppercase"
                                            placeholder="Enter Firstname">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>"
                                            class="form-control" style="text-transform: uppercase"
                                            placeholder="Enter Lastname">
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control" placeholder="Gender"
                                            style="text-transform: uppercase" required>
                                            <option><?php echo $row['gender']; ?></option>
                                            <option>MALE</option>
                                            <option>FEMALE</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" value="<?php echo $row['username']; ?>"
                                            class="form-control" placeholder="ENTER USERNAME">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="teacher_stat" class="form-control" placeholder="Status"
                                            style="text-transform: uppercase" required>
                                            <option><?php echo $row['teacher_stat']; ?></option>
                                            <option>ACTIVATED</option>
                                            <option>DEACTIVATED</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <center><button name="update" type="submit" class="btn btn-success"
                                            href="teacher.php"><i class="fas fa-edit">
                                            </i> Edit</button>
                                        <a href="teacher.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i>
                                            Back </a>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php		
                    if (isset($_POST['update'])){

                    $username = $_POST['username'];
                    $firstname = strtoupper($_POST['firstname']);
                    $lastname = strtoupper($_POST['lastname']);
                    $gender = $_POST['gender'];
                    $teacher_stat = $_POST['teacher_stat'];
                    
                    mysqli_query($conn,"update tbl_teacher set username = '$username'  , 
                    firstname = '$firstname' , lastname = '$lastname' , gender = '$gender', teacher_stat = '$teacher_stat' where teacher_id = '$get_id' ")
                    or die(mysqli_error());

                    mysqli_query($conn,"insert into tbl_activity_log (date,username,action) values(NOW(),'$username','Edit Teacher $username')")
                    or die(mysqli_error());
                    ?>
                    <script type="text/javascript">
                    $(document).ready(function() {
                        var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 100
                        });
                        toastr.success("Success",
                            "Teacher Data Successfully Updated"
                        );
                        setTimeout(function() {
                            window.location = "teacher.php";
                        }, 1000);
                    });
                    </script>
                    <?php
                    }
                    ?>
                    <div class="col-md-6">
                        <form method="post">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-edit"></i> Update Teacher Password</h3>
                                </div>
                                <?php
							$query = mysqli_query($conn,"SELECT * from tbl_teacher 
                            where teacher_id = '$get_id' and tbl_teacher.isDeleted=false")or die(mysqli_error());
							$row = mysqli_fetch_array($query);
							?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group mb-12">
                                            <input name="password" type="password" id="password" class="form-control"
                                                placeholder="Enter New Password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-eye toggle-password float-right"
                                                        toggle="#password"></span>
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
                                                    <span class="fas fa-eye toggle-password1 float-right"
                                                        toggle="#retype_password"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="teacher_id" value="<?php echo $_SESSION['id'] ?>" />
                                </div>
                                <div class="card-footer">
                                    <center><button name="update_password" type="submit" class="btn btn-success"><i
                                                class="fas fa-edit">
                                            </i> Update</button>
                                    </center>
                                </div>
                            </div>
                        </form>
                        <?php 

                        if (isset($_POST['update_password'])) {
            
                        $password = $_POST['password'];
                        $vpassword = $_POST['retype_password'];
                        $hashedPassword = hash('sha256', $password);

                        if ($password != $vpassword) { ?>
                        <script>
                        toastr.warning("Change Password Failed",
                            "New Password does not match with your retyped password");
                        </script>
                        <?php } else {

                        mysqli_query($conn,"UPDATE tbl_teacher SET password = '$hashedPassword' WHERE teacher_id = '$get_id' ") or die(mysqli_error());
                        
                        ?>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            var Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 100
                            });
                            toastr.success("Success",
                                "Teacher Password Successfully Updated"
                            );
                            setTimeout(function() {
                                window.location = "teacher.php";
                            }, 1000);
                        });
                        </script>
                        <?php  }  }?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
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
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>
</body>

</html>