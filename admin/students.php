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
                        <form id="add_student" method="post">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-plus"> Add Student</i></h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Select Section</label>
                                        <select name="class_id" class="form-control" required>
                                            <option>SELECT SECTION</option>
                                            <?php
                                                $class_query = mysqli_query(
                                                $conn,
                                                'select * from tbl_class order by class_name'
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
                                        <input name="username" type="varchar" maxlength="7" class="form-control"
                                            placeholder="Enter ID Number">
                                    </div>
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input name="firstname" type="text" class="form-control"
                                            placeholder="Enter Firstname">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input name="lastname" type="text" class="form-control"
                                            placeholder="Enter Lastname">
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
                                        <input type="number" maxlength="2" min="10" max="100" class="form-control"
                                            name="age" placeholder="AGE" required>
                                    </div>
                                    <input type="hidden" name="teacher_id" value="<?php echo $_SESSION['id'] ?>" />
                                </div>
                                <div class="card-footer">
                                    <center><button name="save" type="submit" class="btn btn-success"><i
                                                class="fas fa-plus">
                                                Add</i></button></center>
                                </div>
                            </div>
                        </form>
                    </div>
                    <script>
                    jQuery(document).ready(function($) {
                        $("#add_student").submit(function(e) {
                            e.preventDefault();
                            var _this = $(e.target);
                            var formData = $(this).serialize();
                            $.ajax({
                                type: "POST",
                                url: "save_student.php",
                                data: formData,
                                success: function(html) {
                                    alert("Student Successfully  Added", {
                                        header: 'Student Added'
                                    });
                                    $('#studentTableDiv').load('student_table.php',
                                        function(response) {
                                            $("#studentTableDiv").html(response);
                                            $('#example').dataTable({
                                                "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
                                                "sPaginationType": "bootstrap",
                                                "oLanguage": {
                                                    "sLengthMenu": "_MENU_ records per page"
                                                }
                                            });
                                            $(_this).find(":input").val('');
                                            $(_this).find('select option').attr(
                                                'selected', false);
                                            $(_this).find('select option:first').attr(
                                                'selected', true);
                                        });
                                }
                            });
                        });
                    });
                    </script>
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Student List</h3>
                            </div>

                            <div class="card-body">
                                <?php include 'database.php'; ?>
                                <form action="delete_student.php" method="post">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <ul data-toggle="modal" href="#student_delete" id="delete"
                                            class="btn btn-danger" name=""><i class="fas fa-trash"></i></ul>
                                        <?php include 'modal_delete.php'; ?>
                                        <ul data-toggle="modal" href="#student_restore" id="delete"
                                            class="btn btn-primary" name=""><i class="fas fa-recycle"></i> Recycle Bin
                                        </ul>
                                        <div class="float-right">
                                            <ul class="nav nav-pills">
                                                <li class="active">
                                                    <a href="students.php">All</a>
                                                </li>
                                                <li class="">
                                                    <a href="unreg_students.php">Unregistered</a>
                                                </li>
                                                <li class="">
                                                    <a href="reg_students.php">Registered</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th></th>
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
                                                    <input id="optionsCheckbox" type="checkbox" value=id="check1"
                                                        class="uniform_on" name="selector[]">
                                                    <label for="check1"></label>
                                                </td>
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
    <script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000
        });
        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Student Has Been Deleted.')
        });
    });
    </script>
</body>

</html>