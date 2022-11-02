<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Students</title>

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
                        "select * from tbl_teacher_class
							LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id
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
                                <h3 class="card-title">Task Progress</h3>
                                <?php
                                ($query = mysqli_query(
                                    $conn,
                                    "select * FROM tbl_task where class_id = '$get_id' AND isDeleted = false order by fdatein DESC"
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
                                    "select * FROM tbl_task where class_id = '$get_id' order by fdatein DESC"
                                )) or die(mysqli_error());
                                $count = mysqli_num_rows($query);
                                if ($count == '0') { ?>
                                <div class="alert alert-info">No Task Currently Uploaded</div>
                                <?php } else { ?>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date Upload</th>
                                            <th>Activity Name</th>
                                            <th>Description</th>
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
                                            ORDER BY fdatein DESC"
                                        )) or die(mysqli_error());
                                        while (
                                            $row = mysqli_fetch_array($query)
                                        ) {

                                            $id = $row['task_id'];
                                            $floc = $row['floc'];
                                            ?>
                                        <tr>
                                            <td><?php echo $row['fdatein']; ?></td>
                                            <td><?php echo $row['fname']; ?></td>
                                            <td><?php echo $row['fdesc']; ?></td>
                                            <td><?php echo $row['end_date']; ?></td>
                                            <td><?php echo $row['total_points']; ?></td>
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
                                            <td width="140">
                                                <form id="assign_save" method="post" action="submit_task.php<?php echo '?id=' .
                                                    $get_id; ?>&<?php echo 'post_id=' . $id; ?>">
                                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                    <?php if ($floc == '') {
                                                    } else {
                                                         ?>
                                                    <?php
                                                    } ?>
                                                    <button data-placement="bottom" title="Submit Task"
                                                        id="<?php echo $id; ?>submit" class="btn btn-success"
                                                        name="btn_task"><i class="fas fa-upload"></i> Submit
                                                        Task</button>
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
            $(`#${targetElement}`).html('Invalid Date');
            return;
        }

        if (diff <= 0) {
            $(`#${targetElement}`).html('Deadline has Passed');
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