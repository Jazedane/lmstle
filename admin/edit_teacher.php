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
                    <div class="col-md-3" id="adduser">
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
                        toastr.success(
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
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Teacher List</h3>
                            </div>
                            <div class="card-body">
                                <form action="delete_teacher.php" method="post">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Gender</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
													$teacher_query = mysqli_query($conn,"select * from tbl_teacher where tbl_teacher.isDeleted=false")or die(mysqli_error());
													while($row = mysqli_fetch_array($teacher_query)){
													$id = $row['teacher_id'];
													?>
                                            <tr>
                                                <td><?php
                                                $firstname = $row['firstname'];
                                                $lastname = $row['lastname'];
                                                $firstname = strtoupper(
                                                    $firstname
                                                );
                                                $lastname = strtoupper(
                                                    $lastname
                                                );
                                                echo $lastname .
                                                    ', ' .
                                                    $firstname;
                                                ?></td>
                                                <td><?php
                                                $username = $row['username'];
                                                $username = strtoupper(
                                                    $username
                                                );
                                                echo $username;
                                                ?></td>
                                                <td><?php
                                                $gender = $row['gender'];
                                                $gender = strtoupper(
                                                    $gender);
                                                echo $gender;
                                                ?></td>
                                                <td><?php
                            					if($row['teacher_stat'] =='ACTIVATED') {
                              						echo "<span class='badge badge-success'>ACTIVATED</span>";
                            					}elseif($row['teacher_stat'] =='DEACTIVATED'){
                              						echo "<span class='badge badge-danger'>DEACTIVATED</span>";
                                                } ?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
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