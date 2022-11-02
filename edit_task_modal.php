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

    $query = mysqli_query($conn,"SELECT * FROM tbl_student_task
							WHERE student_task_id='$student_task_id'")or die(mysqli_error());
    $result = mysqli_fetch_assoc($query);

    $fdesc = $result['fdesc'];
    $floc = $result['floc'];
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
                            $school_year = $school_year_query_row['school_year'];
                            ?>
                            <li class="breadcrumb-item"><a href="#"><b>Home</b></a><span class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $school_year_query_row['school_year']; ?></a></li>
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
                                <div id="" class="float-right"><a
                                        href="./submit_task.php<?php echo '?id='.$get_id ?>&<?php echo 'post_id='.$post_id ?>">
                                        <i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                            <form class="" id="edit_task" action="edit.php<?php echo '?id='.$get_id; ?>" method="post"
                                enctype="multipart/form-data" name="upload">
                                <input type="hidden" name="student_task_id" value="<?php echo $student_task_id; ?>" />
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="activity_name">Activity Name</label>
                                        <input type="text" name="fname" id="inputtask" class="form-control"
                                            value="<?php echo $result['fname']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="inputEmail">Activity</label>
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-control">
                                                <input name="uploaded_file" type="file"
                                                    id="formFileMultiple" value="<?php echo $result['floc']; ?>" multiple required> <?php echo $result['floc']; ?></input>
                                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                                <input type="hidden" name="id" value="<?php echo $post_id; ?>" />
                                                <input type="hidden" name="get_id" value="<?php echo $get_id; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="feedback">Feedback</label>
                                        <textarea id="assigntextarea" placeholder="Description" name="fdesc"
                                            class="form-control" value="<?php echo $result['fdesc']; ?>"
                                            required><?php echo $result['fdesc']; ?></textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <center>
                                        <button class="btn btn-info" name="Upload" type="submit" value="Upload">Save
                                            Changes</button>
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
    jQuery(document).ready(function($) {
        $("#edit_task").submit(function(e) {
            e.preventDefault();
            var _this = $(e.target);
            var formData = new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: "admin/upload_task.php",
                data: formData,
                success: function(html) {
                    alert("Activity Successfully Uploaded", {
                        header: 'Activity Uploaded'
                    });
                    window.location.reload()
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