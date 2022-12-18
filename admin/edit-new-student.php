<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Students</title>

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
                    <div class="col-md-6">
                        <form method="post" id="edit_student">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-edit"></i> Edit Student</h3>
                                </div>
                                <?php
							        $query = mysqli_query($conn,"SELECT * FROM tbl_student 
                                    LEFT JOIN tbl_class ON tbl_class.class_id = tbl_student.class_id 
                                    where student_id = '$get_id' and tbl_student.isDeleted=false")or die(mysqli_error());
							        $row = mysqli_fetch_array($query);
							    ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Class Name</label>
                                        <select name="class_id" class="form-control">
                                            <option selected><?php echo $row['class_name']; ?></option>
                                            <?php
                                                $class_query = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbl_teacher_class 
                                                LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id and tbl_teacher_class.school_year_id 
                                                WHERE teacher_id = '$session_id' 
                                                AND tbl_class.isDeleted = false order by class_name"
                                                );
                                                while (
                                                    $class_row = mysqli_fetch_array(
                                                    $class_query
                                                )
                                                ) { ?>
                                            <option value="<?php echo $class_row[
                                                'class_id'
                                                ]; ?>">
                                                <?php echo $class_row[
                                                    'class_name'
                                                ]; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>ID Number</label>
                                        <input name="username" value="<?php echo $row['username']; ?>" type="varchar"
                                            maxlength="7" class="form-control" onBlur='addDashes(this)'
                                            autocomplete="off" placeholder="ENTER ID NUMBER">
                                    </div>
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input name="firstname" value="<?php echo $row['firstname']; ?>" type="text"
                                            class="form-control" placeholder="Enter Firstname"
                                            style="text-transform: uppercase">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input name="lastname" value="<?php echo $row['lastname']; ?>" type="text"
                                            class="form-control" placeholder="Enter Lastname"
                                            style="text-transform: uppercase">
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control" placeholder="Gender" required>
                                            <option selected><?php echo $row['gender']; ?></option>
                                            <option>MALE</option>
                                            <option>FEMALE</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input name="age" type="number" value="<?php echo $row['age']; ?>" maxlength="2"
                                            min="15" max="25" class="form-control" placeholder="AGE" required>
                                    </div>
                                    <input type="hidden" name="teacher_id" value="<?php echo $_SESSION['id'] ?>" />
                                </div>
                                <div class="card-footer">
                                    <center><button name="update" type="submit" class="btn btn-success"><i
                                                class="fas fa-edit">
                                            </i> Edit</button>
                                        <a href="new-students.php" class="btn btn-primary"><i
                                                class="fas fa-arrow-left"></i>
                                            Back </a>
                                    </center>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['update'])) {
                               
                            $username = $_POST['username'];
                            $firstname = strtoupper($_POST['firstname']);
                            $lastname = strtoupper($_POST['lastname']);
                            $gender = $_POST['gender'];
                            $age = $_POST['age'];
                            $cys = $_POST['class_id'];
                    
                            mysqli_query($conn,"UPDATE tbl_student SET username = '$username' , firstname ='$firstname' , lastname = '$lastname' , 
                            gender = '$gender', age = '$age', class_id = '$cys' WHERE student_id = '$get_id' ") or die(mysqli_error());

		                ?>
                        <SCRIPT LANGUAGE="JavaScript">
                        function addDashes(f) {
                            f.value = f.value.replace(/\D/g, '');

                            f.value = f.value.slice(0, 2) + "-" + f.value.slice(2, 8);
                        }
                        </SCRIPT>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            var Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1000
                            });
                            toastr.success(
                                "Student Data Successfully Updated"
                            );
                            setTimeout(function() {
                                window.location = "new-students.php";
                            }, 1000);
                        });
                        </script>
                        <?php  }  ?>
                    </div>
                    <div class="col-md-6">
                        <form method="post">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-edit"></i> Update Student Password</h3>
                                </div>
                                <?php
							    $query = mysqli_query($conn,"SELECT * FROM tbl_student 
                                LEFT JOIN tbl_class ON tbl_class.class_id = tbl_student.class_id 
                                where student_id = '$get_id' and tbl_student.isDeleted=false")or die(mysqli_error());
							    $row = mysqli_fetch_array($query);
							    ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group mb-12">
                                            <input name="password" type="password" id="password-field"
                                                class="form-control" placeholder="ENTER PASSWORD">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-eye toggle-password float-right"
                                                        toggle="#password-field"></span>
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
                        $hashedPassword = hash('sha256', $password);
                        mysqli_query($conn,"UPDATE tbl_student SET password = '$hashedPassword' WHERE student_id = '$get_id' ") or die(mysqli_error());
                        
                        ?>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            var Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 100
                            });
                            toastr.success(
                                "Student Password Successfully Updated"
                            );
                            setTimeout(function() {
                                window.location = "new-students.php";
                            }, 1000);
                        });
                        </script>
                        <?php  }  ?>
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