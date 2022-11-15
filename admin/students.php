<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Students</title>

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
                            <li class="breadcrumb-item active">Add Student</li>
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
                                    <h3 class="card-title"><i class="fas fa-plus"></i> Add Student</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Select Section</label>
                                        <select name="class_id" class="form-control" required>
                                            <option>SELECT SECTION</option>
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
                                        <input name="username" type="varchar" maxlength="6" class="form-control"
                                            placeholder="Enter ID Number" onBlur='addDashes(this)' autocomplete="off"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input name="firstname" type="text" class="form-control"
                                            placeholder="Enter Firstname" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input name="lastname" type="text" class="form-control"
                                            placeholder="Enter Lastname" required>
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
                                        <label>Age</label>
                                        <input type="number" maxlength="2" min="15" max="25" class="form-control"
                                            name="age" placeholder="AGE" required>
                                    </div>
                                    <input type="hidden" name="teacher_id" value="<?php echo $_SESSION['id'] ?>" />
                                </div>
                                <div class="card-footer">
                                    <center><button name="save" type="button" class="btn btn-success swalDefaultSuccess"><i
                                                class="fas fa-plus">
                                            </i> Add</button></center>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                            if (isset($_POST['save'])){
                            $username = $_POST['username'];
                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];


                            $query = mysqli_query($conn,"select * from tbl_student where username  =  '$username' and firstname  =  '$firstname' and lastname  =  '$lastname' ")or die(mysqli_error());
                            $count = mysqli_num_rows($query);

                            if ($count > 0){ ?>
                    <script>
                    alert('Student Already Exist');
                    </script>
                    <?php
                            }else{
                            $class_id = $_POST['class_id'];
                            $username = $_POST['username'];
                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];
                            $gender = $_POST['gender'];
                            $age = $_POST['age'];
                            $teacher_id = $_POST['teacher_id'];
                            $hashedPassword = hash('sha256', $lastname . $username);

                            $query = "SELECT * FROM tbl_teacher_class WHERE teacher_id = '$teacher_id' AND class_id='$class_id';";
                            $result = mysqli_query($conn, $query);
                            $row   = mysqli_fetch_assoc($result);
                            $teacher_class_id = $row['teacher_class_id'];

                            mysqli_query(
                                $conn,
                                "INSERT INTO 
                                tbl_student 
                                (username,firstname,lastname,gender,age,location,class_id,status,password) 
                                VALUES 
                                ('$username','$firstname','$lastname','$gender','$age','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','Registered','$hashedPassword');"
                            ) or die(mysqli_error());

                            $student_id = mysqli_insert_id($conn);

                            mysqli_query(
                                $conn,
                                "INSERT INTO 
                                tbl_teacher_class_student 
                                (teacher_class_id,student_id,teacher_id) 
                                VALUES 
                                ('$teacher_class_id','$student_id','$teacher_id');"
                            ) or die(mysqli_error());
                    ?>
                    <script>
                        var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('.swalDefaultSuccess').click(function() {
                            Toast.fire({
                                icon: 'success',
                                title: 'Student Successfully Added'
                            })
                        });
                    window.location = "students.php";
                    </script>
                    <?php
                        }
                        }
                    ?>
                    <SCRIPT LANGUAGE="JavaScript">
                    function addDashes(f) {
                        f.value = f.value.replace(/\D/g, '');

                        f.value = f.value.slice(0, 2) + "-" + f.value.slice(2, 8);
                    }
                    </SCRIPT>
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Student List</h3>
                            </div>

                            <div class="card-body">
                                <form action="delete_student.php" method="post">
                                    <table id="example1" class="table table-bordered table-striped">
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
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            ($query = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbl_student 
				                                LEFT JOIN tbl_class ON tbl_student.class_id = tbl_class.class_id 
				                                WHERE tbl_student.isDeleted=false
				                                ORDER BY tbl_student.student_id DESC"
                                            )) or die(mysqli_error($conn));
                                            while ($row = mysqli_fetch_array($query)) {
                                                $id = $row['student_id']; ?>

                                            <tr>
                                                <td width="30">
                                                    <input id="checkAll" type="checkbox" value="<?php echo $id; ?>"
                                                        class="uniform_on" name="selector[]">
                                                    <label for="check1"></label>
                                                </td>
                                                <td><?php $firstname = $row['firstname'];
						                                $lastname = $row['lastname'];
						                                $firstname = strtoupper ($firstname);
						                                $lastname = strtoupper($lastname);
						                                echo $lastname .', '. $firstname; 
						                                $firstname = array($firstname);
						                                sort($firstname); ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php $gender = $row['gender'];
					                                $gender = strtoupper ($gender);
					                                echo $gender ?></td>
                                                <td><?php echo $row['age']; ?></td>
                                                <td width="100"><?php $class_name = $row['class_name'];
					                                $class_name = strtoupper ($class_name);
					                                echo $class_name ?></td>

                                                <td width="30"><a href="edit_student.php<?php echo '?id=' .
                                                    $id; ?>" class="btn btn-success"><i class="fas fa-edit"></i> </a>
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