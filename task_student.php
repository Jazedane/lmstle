<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Progress</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>
    <?php $get_id = $_GET['id']; ?>
</head>

<body>
    <?php include 'homepage2.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <?php
                    ($class_query = mysqli_query(
                        $conn,
                        "SELECT * from tbl_teacher_class
							LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id
                            LEFT JOIN tbl_school_year ON tbl_school_year.school_year_id = tbl_teacher_class.school_year_id
						    where teacher_class_id = '$get_id'"
                    )) or die(mysqli_error());
                    $class_row = mysqli_fetch_array($class_query);
                    ?>
                    <div class="col-sm-6">
                        <h1>Uploaded Task</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#"><?php echo $class_row[
                                    'class_name'
                                ]; ?></a> <span class="divider"></span>
                            </li>
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $class_row[
                                        'school_year'
                                    ]; ?></a> <span class="divider"></span></li>
                            <li class="breadcrumb-item active"><a href="#"><b>Uploaded Tasks</b></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Task Update</h3>
                                <?php
                                ($query = mysqli_query(
                                    $conn,
                                    "SELECT * FROM tbl_task where class_id = '$get_id' AND isDeleted = false order by date_upload DESC"
                                )) or die(mysqli_error());
                                $count = mysqli_num_rows($query);
                                ?>
                                <div id="" class="float-sm-right">Number of Task: <span
                                        class="badge badge-info"><?php echo $count; ?></span></div>
                            </div>
                            <div class="card-body">
                                <?php
                                ($query = mysqli_query(
                                    $conn,
                                    "SELECT * FROM tbl_task WHERE class_id = '$get_id' order by date_upload DESC"
                                )) or die(mysqli_error());
                                $count = mysqli_num_rows($query);
                                if ($count == '0') { ?>
                                <div class="alert alert-primary"><i class="fas fa-info-circle"></i> No Task Currently
                                    Uploaded</div>
                                <?php } else { ?>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date Upload</th>
                                            <th>Task Name</th>
                                            <th>Quarter</th>
                                            <th>Due Date</th>
                                            <th>Points</th>
                                            <th>Time Left</th>
                                            <th></th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        ($query = mysqli_query(
                                            $conn,
                                            "SELECT * FROM tbl_task 
                                            WHERE class_id = '$get_id' AND isDeleted = false
                                            ORDER BY date_upload DESC"
                                        )) or die(mysqli_error());
                                        while (
                                            $row = mysqli_fetch_array($query)
                                        ) {

                                            $id = $row['task_id'];
                                            $task_file = $row['task_file'];
                                            ?>
                                        <tr>
                                            <td width="220"><?php $date_upload = date_create($row['date_upload']);
                                                    echo date_format(
                                                    $date_upload,
                                                    'F d, Y h:i A'
                                                    ); ?>
                                            </td>
                                            <td><?php echo $row['task_name']; ?></td>
                                            <td width="40"><center><?php echo $row[
                                                'quarter'
                                            ]; ?></center></td>
                                            <td width="220"><?php $end_date = date_create($row['end_date']);
                                                    echo date_format(
                                                    $end_date,
                                                    'F d, Y h:i A'
                                                    ); ?>
                                            </td>
                                            <td width="40"><center><?php echo $row['total_points']; ?></center></td>
                                            <td id="<?php echo $row['task_id'] ?>-running-due">
                                                <script>
                                                $(document).ready(function() {
                                                    setInterval(() => {
                                                        calculateTimeLeft(
                                                            '<?php echo $row['task_id'] ?>-running-due',
                                                            '<?php echo $row['end_date'] ?>'
                                                        );
                                                    }, 1000)
                                                })
                                                </script>
                                            </td>
                                            <td width="120">
                                                <form id="assign_save" method="post" action="submit_task.php<?php echo '?id=' .
                                                    $get_id; ?>&<?php echo 'post_id=' . $id; ?>">
                                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                    <?php if ($task_file == '') {
                                                    } else {
                                                         ?>
                                                    <?php
                                                    } ?>
                                                    <button data-placement="bottom" title="Submit Task"
                                                        id="<?php echo $id; ?>submit" class="btn btn-success"
                                                        name="btn_task"><i class="fas fa-upload"></i> Submit </button>
                                                </form>
                                            </td>
                                            <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#<?php echo $id; ?>submit').tooltip('show');
                                                $('#<?php echo $id; ?>submit').tooltip('hide');
                                            });
                                            </script>
                                            <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#<?php echo $id; ?>download').tooltip('show');
                                                $('#<?php echo $id; ?>download').tooltip('hide');
                                            });
                                            </script>

                                        </tr>

                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php }
                                ?>
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

    <script>
    /**
     * Calculates the time left for a task
     * 
     * @param {string} elementId - The id of the element to update
     * @param {string} dueDate - The due date of the task
     */
    function calculateTimeLeft(targetElement, _dueDate) {
        var now = new Date();
        var dueDate = new Date(_dueDate);
        var diff = dueDate.getTime() - now.getTime();

        if (isNaN(diff)) {
            $(`#${targetElement}`).html('<span class="badge badge-warning">Invalid Date</span>');
            return;
        }

        if (diff <= 0) {
            $(`#${targetElement}`).html('<span class="badge badge-danger">Deadline has Passed</span>');
            return;
        }

        var days = Math.floor(diff / (1000 * 60 * 60 * 24));
        var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((diff % (1000 * 60)) / 1000);

        $(`#${targetElement}`).html(days + " days " + hours + " hours " + minutes + " minutes " + seconds +
            " seconds ");
    }
    </script>
</body>

</html>