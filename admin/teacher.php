<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Teacher</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>
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
                            <li class="breadcrumb-item active">Add Teacher</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <form method="post">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-plus"></i> Add Teacher</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" class="form-control"
                                            placeholder="Enter Firstname" style="text-transform: uppercase" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" class="form-control"
                                            placeholder="Enter Lastname" style="text-transform: uppercase" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control" placeholder="Gender" required>
                                            <option>SELECT GENDER</option>
                                            <option>MALE</option>
                                            <option>FEMALE</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control"
                                            placeholder="ENTER USERNAME" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="ENTER PASSWORD" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <center><button name="save" type="submit" class="btn btn-success"><i
                                                class="fas fa-plus">
                                            </i> Add</button></center>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Teacher List</h3>
                            </div>
                            <div class="card-body">
                                <form action="delete_teacher.php" method="post">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <ul data-toggle="modal" href="#teacher_delete" id="delete"
                                            class="btn btn-danger" name=""><i class="fas fa-trash"></i></ul>
                                        <?php include 'modal_delete.php'; ?>
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" name="selectAll" id="checkAll" />
                                                    <script>
                                                    $("#checkAll").click(function() {
                                                        $('input:checkbox').not(this).prop('checked', this
                                                            .checked);
                                                    });
                                                    </script>
                                                </th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Gender</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            ($teacher_query = mysqli_query(
                                                $conn,
                                                'SELECT * FROM tbl_teacher WHERE isDeleted=false'
                                            )) or die(mysqli_error());
                                            while (
                                                $row = mysqli_fetch_array(
                                                    $teacher_query
                                                )
                                            ) {
                                                $id = $row['teacher_id']; ?>

                                            <tr>
                                                <td width="30">
                                                    <input id="checkAll" class="uniform_on" name="selector[]"
                                                        type="checkbox" value="<?php echo $id; ?>">
                                                </td>
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

                                                <td width="40">
                                                    <a href="edit_teacher.php<?php echo '?id=' .$id; ?>"
                                                        class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                </td>
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
    <?php
                        if (isset($_POST['save'])){
                        $firstname = strtoupper($_POST['firstname']);
                        $lastname = strtoupper($_POST['lastname']);
                        $gender = $_POST['gender'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $hashedPassword = hash('sha256',$password);

                        $query = mysqli_query($conn,"select * from tbl_teacher where username = '$username'")or die(mysqli_error());
                        $count = mysqli_num_rows($query);

                        if ($count > 0){ ?>
    <script>
    alert('Data Already Exist');
    </script>
    <?php
                        }else {
                        mysqli_query($conn,"INSERT INTO tbl_teacher (username,password,firstname,lastname,gender,location,teacher_stat) 
                        values('$username','$hashedPassword','$firstname','$lastname','$gender','NO-IMAGE-AVAILABLE.jpg','Activated')")or die(mysqli_error());
                        mysqli_query($conn,"INSERT INTO tbl_activity_log (date,username,action) 
                        values(NOW(),'$username','Add User $username')")or die(mysqli_error());
                    ?>
    <script>
    alert("Teacher Successfully Added!")
    window.location.reload();
    </script>
    <?php
                    }
                    }
                    ?>
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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