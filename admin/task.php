<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Task</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php $get_id = $_GET['id']; ?>
</head>

<body>
    <?php include 'homepage2.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tasks</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <?php
                                ($class_query = mysqli_query(
                                $conn,
                                "SELECT * FROM tbl_teacher_class
							    LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id
							    WHERE teacher_class_id = '$get_id'"
                                )) or die(mysqli_error());
                                $class_row = mysqli_fetch_array($class_query);
                                $class_id = $class_row['class_id'];
                        ?>

                            <li class="breadcrumb-item"><a href="#"><?php echo $class_row['class_name']; ?></a> <span
                                    class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $class_row['school_year']; ?></a> <span class="divider"></span></li>
                            <li class="breadcrumb-item active"><a href="#"><b>Tasks List</b></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Add Activity</h3>
                            </div>
                            <form class="" action="assign_save.php<?php echo '?id='.$get_id; ?>" method="post"
                                enctype="multipart/form-data" name="upload">
                                <div class="control-group"></div>
                                <input type="hidden" name="id" value="<?php echo $session_id ?>" />
                                <input type="hidden" name="teacher_class_id" value="<?php echo $get_id; ?>">
                                <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Activity Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter activity name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="desc" rows="3"
                                            placeholder="Enter description" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="due_date">Due Date:</label>
                                        <div class="input-group date" id="reservationdatetime"
                                            data-target-input="nearest">
                                            <input type="text" name="end_date" class="form-control datetimepicker-input"
                                                data-target="#reservationdatetime"
                                                value="<?php echo isset($end_date)? datetime('Y-m-d h:i:sa',strtotime($end_date)): ''; ?>"
                                                required>
                                            <div class="input-group-append" data-target="#reservationdatetime"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <center><button name="Upload" type="submit" value="Upload"
                                                class="btn btn-success">Submit</button>
                                        </center>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Tasks</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <a data-toggle="modal" href="#task_restore" id="delete" class="btn btn-primary"
                                        name=""><i class="fas fa-recycle"></i> Restore
                                        Data</a>
                                    <thead>
                                        <tr>
                                            <th>Date Upload</th>
                                            <th>Activity Name</th>
                                            <th>Description</th>
                                            <th>Due Date</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        ($query = mysqli_query(
                                            $conn,
                                            "SELECT * FROM tbl_task 
                                            WHERE class_id = '$get_id' AND teacher_id = '$session_id' AND isDeleted=false
                                            ORDER BY fdatein DESC "
                                        )) or die(mysqli_error());
                                        while (
                                            $row = mysqli_fetch_array($query)
                                        ) {

                                            $id = $row['task_id'];
                                            $floc = $row['floc'];
                                            ?>
                                        <tr>
                                            <td><?php echo $row[
                                                'fdatein'
                                            ]; ?></td>
                                            <td><?php echo $row[
                                                'fname'
                                            ]; ?></td>
                                            <td><?php echo $row[
                                                'fdesc'
                                            ]; ?></td>
                                            <td><?php echo $row[
                                                'end_date'
                                            ]; ?></td>
                                            <td width="10">
                                                <form method="post" action="view_submit_task.php<?php echo '?id=' .
                                                        $get_id; ?>&<?php echo 'post_id=' . $id; ?>">

                                                    <button data-placement="bottom" title="View Student Who Submit Task"
                                                        id="<?php echo $id; ?>view" class="btn btn-success"><i
                                                            class="fas fa-folder"></i></button>

                                                </form>
                                            </td>
                                            <td width="10">
                                                <form method="post" action="view_notsubmit_task.php<?php echo '?id=' .
                                                        $get_id; ?>&<?php echo 'post_id=' . $id; ?>">

                                                    <button data-placement="bottom"
                                                        title="View Student Who Did Not Submit Task"
                                                        id="<?php echo $id; ?>viewnot" class="btn btn-info"><i
                                                            class="fas fa-folder"></i></button>

                                                </form>
                                            </td>
                                            <td>
                                                <?php if ($floc == '') {
                                                } else {
                                                     ?>
                                                <?php
                                                } ?>
                                                <a data-placement="bottom" title="Remove" id="<?php echo $id; ?>remove"
                                                    class="btn btn-danger" href="#<?php echo $id; ?>"
                                                    data-toggle="modal"><i class="fas fa-trash"></i></a>
                                                <?php include 'delete_task_modal.php'; ?>
                                            </td>
                                            <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#<?php echo $id; ?>remove').tooltip('show');
                                                $('#<?php echo $id; ?>remove').tooltip('hide');
                                            });
                                            </script>
                                            <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#<?php echo $id; ?>view').tooltip('show');
                                                $('#<?php echo $id; ?>view').tooltip('hide');
                                            });
                                            </script>
                                            <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#<?php echo $id; ?>viewnot').tooltip('show');
                                                $('#<?php echo $id; ?>viewnot').tooltip('hide');
                                            });
                                            </script>
                                            <?php
                                        }
                                        ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>
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