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
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo $student_name; ?></h3>
                                <div class="card-body">
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
                            </div>
                            <div class="card-body">
                                <table id="data-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="80">Date Submitted</th>
                                            <th width="80">Title</th>
                                            <th width="80">Points</th>
                                            <th width="80"></th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        $student_task_query = mysqli_query(
                                            $conn,
                                            "select * from tbl_student_task left join tbl_task on tbl_task.task_id = tbl_student_task.task_id where student_id = '$student_id' AND tbl_task.class_id='$get_id';"
                                        ) or die(mysqli_error());
                                        while ($student_task_row = mysqli_fetch_array(
                                            $student_task_query
                                        )) {
                                            $submission_date = $student_task_row[
                                                'task_fdatein'
                                            ];
                                            $task_title = $student_task_row[
                                                'fname'
                                            ];
                                            $task_id = $student_task_row[
                                                'task_id'
                                            ];
                                            $student_task_id = $student_task_row[
                                                'student_task_id'
                                            ];
                                        ?>
                                        <tr>
                                            <td><?php echo $submission_date; ?></td>
                                            <td><?php echo $task_title; ?></td>
                                            <td><?php echo $student_task_row['grade']; ?>/<?php echo $student_task_row['total_points'] ?></td>
                                            <td>
                                                <a href="http://localhost/lmstlee4/admin/view_submit_task.php?id=<?php echo $get_id; ?>&post_id=<?php echo $task_id; ?>">View Task Summary</a>
                                                <a class="ml-2" href="http://localhost/lmstlee4/admin/edit_task_modal.php?id=<?php echo $get_id; ?>&post_id=<?php echo $task_id; ?>&student_task_id=<?php echo $student_task_id; ?>">Edit Grade</a>
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
</body>

<script>
$(document).ready(() => {
    $(function() {
        $("data-table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print", ]
        }).buttons().container().appendTo('#data-table-wrapper .col-md-6:eq(0)');
    });
})
</script>

</html>