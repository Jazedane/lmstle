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
                            <form class="" id="edit_task" method="post" enctype="multipart/form-data" name="upload">
                                <input type="hidden" name="student_task_id" value="<?php echo $student_task_id; ?>" />
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="activity_name">Activity Name</label>
                                        <input type="text" name="name" id="inputtask" class="form-control"
                                            value="<?php echo $result['fname']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="exampleInputFile">Activity</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <label for="formFileMultiple" class="custom-file-label"
                                                    value="<?php echo $result['floc']; ?>">
                                                </label>
                                                <input name="uploaded_file" class="custom-file-input" type="file"
                                                    id="exampleInputFile" value="<?php echo $result['floc']; ?>"
                                                    multiple required>
                                                </input>
                                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                                <input type="hidden" name="id" value="<?php echo $post_id; ?>" />
                                                <input type="hidden" name="get_id" value="<?php echo $get_id; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="feedback">Description (Optional)</label>
                                        <textarea id="summernote" placeholder="Description" name="fdesc"
                                            class="form-control" value=""><?php echo $result['fdesc']; ?></textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <center>
                                        <button class="btn btn-success toastrDefaultSuccess" name="Upload" type="submit"
                                            value="Upload">Save
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
    // Summernote
    $('#summernote').summernote({
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
                url: "admin/upload_task.php?is_update=true",
                data: formData,
                success: function(html) {
                    toastr.success("Activity Successfully Uploaded");
                    setTimeout(function() {
                        window.location = 'submit_task.php<?php echo '?id='.$get_id ?>&<?php echo 'post_id='.$post_id ?>';
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