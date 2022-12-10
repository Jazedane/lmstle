<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Task</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>
    <?php
    $get_id = $_GET['id'];
    $post_id = $_GET['post_id'];
    $student_task_id = $_GET['student_task_id'];

    ($query = mysqli_query(
        $conn,
        "SELECT * FROM tbl_student_task LEFT JOIN tbl_task ON tbl_task.task_id = tbl_student_task.task_id
							WHERE student_task_id='$student_task_id'"
    )) or die(mysqli_error());
    $result = mysqli_fetch_assoc($query);

    $grade = $result['grade'];
    $task_status = $result['task_status'];
    $total_points = $result['total_points'];
    ?>

</head>

<body>
    <?php include 'homepage2.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Task</h1>
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
                            <li class="breadcrumb-item active"><a href="#"><b>Edit Task</b></a></li>
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
                                <h3 class="card-title">Edit Task</h3>
                                <div id="" class="float-right"><a href="./view_submit_task.php<?php echo '?id=' .
                                            $get_id; ?>&<?php echo 'post_id=' .$post_id; ?>">
                                        <i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                            <form class="" action="edit.php" method="post" enctype="multipart/form-data" name="upload">
                                <input type="hidden" name="student_task_id" value="<?php echo $student_task_id; ?>" />
                                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
                                <input type="hidden" name="id" value="<?php echo $get_id; ?>" />
                                <input type="hidden" name="student_id" value="<?php echo $student_id; ?>" />
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="activity_name">Activity Name</label>
                                        <input type="text" name="fname" id="inputtask" class="form-control" value="<?php echo $result[
                                                'fname'
                                            ]; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="feedback">Feedback (Optional)</label>
                                        <textarea id="summernote" placeholder="Description" name="feedback"
                                            class="form-control" rows="4" value=""><?php echo $result[
                                                'feedback'
                                            ]; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="grade">Points</label>
                                        <input type="number" name="grade" maxlength="3" min="0" max="<?php echo $result[
                                            'total_points'
                                        ]; ?>" id="inputtask" class="form-control" value="<?php echo $result[
                                                'grade'
                                            ]; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="task_status">Status</label>
                                        <select name="task_status" class="custom-select custom-select-sm form-control"
                                            required>
                                            <option value="0" <?php echo $task_status ==
                                            0
                                                ? 'selected'
                                                : ''; ?>>
                                                Pending
                                            </option>
                                            <option value="1" <?php echo $task_status ==
                                            1
                                                ? 'selected'
                                                : ''; ?>>
                                                Started
                                            </option>
                                            <option value="2" <?php echo $task_status ==
                                            2
                                                ? 'selected'
                                                : ''; ?>>
                                                On-Progress
                                            </option>
                                            <option value="3" <?php echo $task_status ==
                                            3
                                                ? 'selected'
                                                : ''; ?>>
                                                On-Hold
                                            </option>
                                            <option value="4" <?php echo $task_status ==
                                            4
                                                ? 'selected'
                                                : ''; ?>>
                                                Overdue
                                            </option>
                                            <option value="5" <?php echo $task_status ==
                                            5
                                                ? 'selected'
                                                : ''; ?>>
                                                Done
                                            </option>
                                        </select>
                                    </div>
                                    <div class="card-footer">
                                        <center>
                                            <button class="btn btn-flat bg-gradient-primary" name="Upload" type="submit"
                                                value="Upload">Save
                                                changes</button>
                                        </center>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <script>
        // Summernote
        $('#summernote').summernote( {
        toolbar: [
            ["style", ["style"]],
            ["font", ["bold", "underline", "clear"]],
            ["fontname", ["fontname"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["insert", ["link", "height"]],
            ["view", ["fullscreen", "help"]]
        ]
    })
    </script>
    <script>
    jQuery(document).ready(function($) {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000
        });
        $("#edit_task").submit(function(e) {
            e.preventDefault();
            var _this = $(e.target);
            var formData = new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: "edit.php",
                data: formData,
                success: function(html) {
                    toastr.success("Task Edited Successfully");
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });
    </script>
</body>

</html>