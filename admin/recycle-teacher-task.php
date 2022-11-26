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
                        <form action="restore-data-teacher-task.php" method="post">
                            <table id="example2" class="table table-bordered table-striped">
                                <ul data-toggle="modal" href="#recycle-delete-teacher-task" id="delete"
                                    class="btn btn-danger" name="delete_recycle_teacher_task"><i
                                        class="fas fa-trash"></i> Delete Data</ul>
                                <?php include 'recycle-delete-modal.php'; ?>
                                <ul data-toggle="modal" href="#restore_data_teacher_task" id="restore"
                                    class="btn btn-primary" name=""><i class="fas fa-recycle"></i> Restore data
                                </ul>
                                <?php include 'restore_data_modal.php'; ?>
                                <div class="float-right">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-users"></i> Recycle List
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <a href="recycle-student.php" class="dropdown-item" type="button">
                                                    Student</a>
                                                <a href="recycle-teacher.php" class="dropdown-item" type="button">
                                                    Teacher</a>
                                                <a href="recycle-class.php" class="dropdown-item" type="button">
                                                    Class</a>
                                                <a href="recycle-student-task.php" class="dropdown-item" type="button">
                                                    Student Task</a>
                                                <a href="recycle-teacher-task.php" class="dropdown-item active"
                                                    type="button">
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
                                        <th>Date Upload</th>
                                        <th>Activity Name</th>
                                        <th>Description</th>
                                        <th>Due Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        ($query = mysqli_query(
                                            $conn,
                                            "SELECT * FROM tbl_task 
                                            WHERE teacher_id = '$session_id' AND isDeleted=true
                                            ORDER BY fdatein DESC "
                                        )) or die(mysqli_error());
                                        while (
                                            $row = mysqli_fetch_array($query)
                                        ) {

                                            $id = $row['task_id'];
                                            $floc = $row['floc'];
                                            ?>
                                    <tr>
                                        <td width="30">
                                            <input id="checkAll" type="checkbox" value="<?php echo $id; ?>"
                                                class="uniform_on" name="selector[]">
                                        </td>
                                        <td><?php $fdatein = date_create($row['fdatein']);
                                                    echo date_format(
                                                    $fdatein,
                                                    'M/d/Y h:i a'
                                                    ); ?>
                                        </td>
                                        <td><?php echo $row[
                                                'fname'
                                            ]; ?></td>
                                        <td><?php echo $row[
                                                'fdesc'
                                            ]; ?></td>
                                        <td><?php $end_date = date_create($row['end_date']);
                                            echo date_format(
                                            $end_date,
                                            'M/d/Y h:i a'
                                            ); ?>
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
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript">
    $(document).ready(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $('.delete_recycle_teacher_task').click(function() {
            var selectedIds = $('[name="selector[]"]:checked').map((_, element) => {
                return $(element).val()
            }).get()

            $.ajax({
                type: "POST",
                url: "delete-recycle-teacher-task.php",
                data: ({
                    selector: selectedIds,
                    delete_recycle_teacher_task: true
                }),
                success: function(html) {
                    toastr.error(
                        "Teacher Task Data Permanently Deleted"
                    );
                    setTimeout(function() {
                        window.location = "recycle-teacher-task.php";
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