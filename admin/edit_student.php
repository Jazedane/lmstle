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
                    <div class="col-md-3">
                        <form method="post">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-edit"></i> Edit Student</h3>
                                </div>
                                <?php
							$query = mysqli_query($conn,"select * from tbl_student LEFT JOIN tbl_class ON tbl_class.class_id = tbl_student.class_id 
                            where student_id = '$get_id' and tbl_student.isDeleted=false")or die(mysqli_error());
							$row = mysqli_fetch_array($query);
							?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Class Name</label>
                                        <select name="cys" class="form-control" required>
                                            <option><?php echo $row['class_name']; ?></option>
                                            <?php
                                                $class_query = mysqli_query(
                                                $conn,
                                                'select * from tbl_class where tbl_class.isDeleted=false order by class_name'
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
                                            maxlength="7" class="form-control" placeholder="Enter ID Number">
                                    </div>
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input name="firstname" value="<?php echo $row['firstname']; ?>" type="text"
                                            class="form-control" placeholder="Enter Firstname">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input name="lastname" value="<?php echo $row['lastname']; ?>" type="text"
                                            class="form-control" placeholder="Enter Lastname">
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control" placeholder="Gender" required>
                                            <option><?php echo $row['gender']; ?></option>
                                            <option>MALE</option>
                                            <option>FEMALE</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input name="age" type="number" value="<?php echo $row['age']; ?>" maxlength="2"
                                            min="15" max="25" class="form-control" placeholder="AGE"
                                            required>
                                    </div>
                                    <input type="hidden" name="teacher_id" value="<?php echo $_SESSION['id'] ?>" />
                                </div>
                                <div class="card-footer">
                                    <center><button name="update" type="submit" class="btn btn-success"><i
                                                class="fas fa-edit">
                                                </i> Edit</button>
                                        <a href="students.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i>
                                            Back </a>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                        if (isset($_POST['update'])) {
                               
                            $username = $_POST['username'];
                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];
                            $gender = $_POST['gender'];
                            $age = $_POST['age'];
                            $cys = $_POST['cys'];
                    
                            mysqli_query($conn,"update tbl_student set username = '$username' , firstname ='$firstname' , lastname = '$lastname' , 
                            gender = '$gender', age = '$age', class_id = '$cys' where student_id = '$get_id' ") or die(mysqli_error());

		                ?>

                    <script>
                    window.location = "students.php";
                    </script>

                    <?php     }  ?>
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Teacher List</h3>
                            </div>
                            <div class="card-body">
                                <form action="delete_student.php" method="post">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <ul data-toggle="modal" href="#student_delete" id="delete"
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
                                                <th>ID Number</th>
                                                <th>Gender</th>
                                                <th>Age</th>
                                                <th>Year & Section</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query = mysqli_query($conn,"select * from tbl_student 
                                                LEFT JOIN tbl_class ON tbl_class.class_id = tbl_student.class_id 
                                                WHERE tbl_student.isDeleted=false
                                                ORDER BY tbl_student.student_id DESC") or die(mysqli_error());
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    $id = $row['student_id'];
                                            ?>
                                            <tr>
                                                <td width="30">
                                                    <input id="checkAll" class="uniform_on" name="selector[]"
                                                        type="checkbox" value="<?php echo $id; ?>">
                                                </td>

                                                <td><?php $firstname = $row['firstname'];
						                                  $lastname = $row['lastname'];
						                                  $firstname = strtoupper ($firstname);
						                                  $lastname = strtoupper($lastname);
						                                  echo $lastname .', '. $firstname; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php $gender = $row['gender'];
					                                      $gender = strtoupper ($gender);
					                                                echo $gender ?></td>
                                                <td><?php echo $row['age']; ?></td>

                                                <td width="100"><?php $class_name = $row['class_name'];
					                                                  $class_name = strtoupper ($class_name);
					                                                                echo $class_name ?></td>
                                            </tr>
                                            <?php } ?>

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