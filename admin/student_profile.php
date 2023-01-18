<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Task</title>

    <?php $get_id = $_GET['id']; ?>
    <?php include 'database.php'; ?>
    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>

    <?php
        $student_id = $_GET['student_id'];
        $student_query = mysqli_query($conn, "select * from tbl_student where student_id = '$student_id'") or die(mysqli_error());
        $student_row = mysqli_fetch_array($student_query);
        $student_name = $student_row['firstname'] . " " . $student_row['lastname'];
        $student_profile = $student_row['location'];
    ?>
</head>

<body>
    <?php include 'homepage2.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <?php
                            ($school_year_query = mysqli_query(
                                $conn,
                                'select * from tbl_school_year order by school_year DESC'
                            )) or die(mysqli_error());
                            $school_year_query_row = mysqli_fetch_array(
                                $school_year_query
                            );
                            $school_year =
                                $school_year_query_row['school_year'];
                            ?>
                            <li class="breadcrumb-item"><a href="#"><b>Home</b></a><span class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $school_year_query_row[
                                        'school_year'
                                    ]; ?></a></li>
                            <li class="breadcrumb-item active"><a href="#"><b>Student Profile</b></a></li>
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
                                <h5 class="text-center"><?php echo $student_name; ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img id="avatar" class="img-circle elevation-2"
                                        src="/lmstlee4/admin/uploads/<?php echo $student_profile; ?>" width="80"
                                        height="80">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Student Submissions</h3>
                                <div id="" class="float-right"><a href="my_students.php<?php echo '?id='.$get_id; ?>"><i
                                            class="fas fa-arrow-left"></i> Back</a></div>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="80">Date Submitted</th>
                                            <th width="80">Title</th>
                                            <th width="80">Points</th>
                                            <th width="100"></th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        $student_task_query = mysqli_query(
                                            $conn,
                                            "select * from tbl_student_task 
                                            left join tbl_task on tbl_task.task_id = tbl_student_task.task_id where student_id = '$student_id' 
                                            AND tbl_task.class_id='$get_id' order by task_date_upload;"
                                        ) or die(mysqli_error());
                                        while ($student_task_row = mysqli_fetch_array(
                                            $student_task_query
                                        )) {
                                            $submission_date =  $student_task_row[
                                                'task_date_upload'
                                            ];
                                            $task_title = $student_task_row[
                                                'task_name'
                                            ];
                                            $task_id = $student_task_row[
                                                'task_id'
                                            ];
                                            $student_task_id = $student_task_row[
                                                'student_task_id'
                                            ];
                                        ?>
                                        <tr>
                                            <td><?php $submission_date =  date_create($student_task_row[
                                                'task_date_upload']);
                                                    echo date_format(
                                                    $submission_date,
                                                    'F d, Y h:i A'
                                                    );  ?></td>
                                            <td><?php echo $task_title; ?></td>
                                            <td><?php echo $student_task_row['grade']; ?>/<?php echo $student_task_row['total_points'] ?>
                                            </td>
                                            <td>
                                                <div class="justify content-between">
                                                    <a class="btn btn-primary"
                                                        href="/lmstlee4/admin/view_submit_task.php?id=<?php echo $get_id; ?>&post_id=<?php echo $task_id; ?>"
                                                        title="View Task Summary" data-placement="bottom" id="view">
                                                        <i class="fas fa-envelope"></i> Task Summary</a>
                                                    <a class="btn btn-success"
                                                        href="/lmstlee4/admin/edit_task_modal.php?id=<?php echo $get_id; ?>&post_id=<?php echo $task_id; ?>&student_task_id=<?php echo $student_task_id; ?>"
                                                        title="Edit Grade" data-placement="bottom" id="edit">
                                                        <i class="fas fa-edit"></i> Edit Grade</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
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

    <script type="text/javascript">
    $(document).ready(function() {
        $('#view').tooltip('show');
        $('#view').tooltip('hide');
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#edit').tooltip('show');
        $('#edit').tooltip('hide');
    });
    </script>
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
            order: [
                [0,'desc']
            ],
        });
    });
    </script>
</body>

</html>