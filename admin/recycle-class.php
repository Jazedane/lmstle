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
                        <form action="restore-data-class.php" method="post">
                            <table id="example2" class="table table-bordered table-striped">
                                <ul data-toggle="modal" href="#recycle-delete-class" id="delete" class="btn btn-danger"
                                    name=""><i class="fas fa-trash"></i> Delete Data</ul>
                                <?php include 'recycle-delete-modal.php'; ?>
                                <ul data-toggle="modal" href="#restore_data_class" id="restore" class="btn btn-primary"
                                    name=""><i class="fas fa-recycle"></i> Restore data
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
                                                <a href="recycle-class.php" class="dropdown-item active" type="button">
                                                    Class</a>
                                                <a href="recycle-student-task.php" class="dropdown-item" type="button">
                                                    Student Task</a>
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
                                                $('input:checkbox').not(this).prop('checked', this
                                                    .checked);
                                            });
                                            </script>
                                        </th>
                                        <th>Year And Section</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            ($class_query = mysqli_query(
                                                $conn,
                                                'SELECT * FROM tbl_class WHERE isDeleted=true'
                                            )) or die(mysqli_error());
                                            while (
                                                $class_row = mysqli_fetch_array(
                                                    $class_query
                                                )
                                            ) {
                                                $id = $class_row['class_id']; ?>

                                    <tr>
                                        <td width="30">
                                            <input id="checkAll" class="uniform_on" name="selector[]" type="checkbox"
                                                value="<?php echo $id; ?>">
                                        </td>
                                        <td><?php
                                                $class_name =
                                                    $class_row['class_name'];
                                                $class_name = strtoupper(
                                                    $class_name
                                                );
                                                echo $class_name;
                                                ?></td>
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