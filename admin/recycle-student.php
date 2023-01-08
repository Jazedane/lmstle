<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Recycle Bin</title>

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
                        <h1>Recycle Bin</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Recycle Bin</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Recycle Bin</h3>
                    </div>
                    <div class="card-body">
                        <form id="recycle_data_student" method="post">
                            <table id="example2" class="table table-bordered table-striped">
                                <li data-toggle="modal" href="#recycle-delete-student" id="delete"
                                    class="btn btn-danger" name="delete_recycle_student"><i class="fas fa-trash"></i>
                                    Delete</li>
                                <?php include 'recycle-delete-modal.php'; ?>
                                <li data-toggle="modal" href="#restore_data_student" id="restore"
                                    class="btn btn-primary" name="recycle_data_student"><i class="fas fa-recycle"></i>
                                    Restore
                                </li>
                                <?php include 'restore_data_modal.php'; ?>
                                <div class="float-right">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-users"></i> Student List
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <a href="recycle-student.php" class="dropdown-item active" type="button">
                                                    Student</a>
                                                <a href="recycle-teacher.php" class="dropdown-item"
                                                    type="button">
                                                    Teacher</a>
                                                <a href="recycle-class.php" class="dropdown-item" type="button">
                                                    Class</a>
                                                <a href="recycle-teacher-task.php" class="dropdown-item" type="button">
                                                    Teacher Task</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="selectAll" id="checkAll" />
                                            <script>
                                            $("#checkAll").click(function() {
                                                $('input:checkbox').not(this).prop('checked', this.checked);
                                            });
                                            </script>
                                        </th>
                                        <th>Student Name</th>
                                        <th>ID Number</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>Class Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            ($query = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbl_student 
				                                LEFT JOIN tbl_class ON tbl_student.class_id = tbl_class.class_id 
				                                WHERE tbl_student.isDeleted=true
				                                ORDER BY lastname ASC"
                                            )) or die(mysqli_error($conn));
                                            while ($row = mysqli_fetch_array($query)) {
                                                $id = $row['student_id']; ?>
                                    <tr>
                                        <td width="30">
                                            <input id="checkAll" type="checkbox" value="<?php echo $id; ?>"
                                                class="uniform_on" name="selector[]">
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
                                                ?>
                                        </td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php $gender = $row['gender'];
					                                $gender = strtoupper ($gender);
					                                echo $gender ?></td>
                                        <td><?php echo $row['age']; ?></td>
                                        <td><?php $class_name = $row['class_name'];
					                                $class_name = strtoupper ($class_name);
					                                echo $class_name ?></td>
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
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript">
    $(document).ready(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000
        });
        $('.recycle_data_student').click(function() {
            var selectedIds = $('[name="selector[]"]:checked').map((_, element) => {
                return $(element).val()
            }).get()

            $.ajax({
                type: "POST",
                url: "restore-data-student.php",
                data: ({
                    selector: selectedIds,
                    recycle_data_student: true
                }),
                success: function(html) {
                    toastr.success(
                        "Student Data Successfully Restored"
                    );
                    setTimeout(function() {
                        window.location = "recycle-student.php";
                    }, 1000);
                }
            });
            return false;
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000
        });
        $('.delete_recycle_student').click(function() {
            var selectedIds = $('[name="selector[]"]:checked').map((_, element) => {
                return $(element).val()
            }).get()

            $.ajax({
                type: "POST",
                url: "delete-recycle-student.php",
                data: ({
                    selector: selectedIds,
                    delete_recycle_student: true
                }),
                success: function(html) {
                    toastr.error(
                        "Student Data Permanently Deleted"
                    );
                    setTimeout(function() {
                        window.location = "recycle-student.php";
                    }, 1000);
                }
            });
            return false;
        });
    });
    </script>
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": []
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