<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Activity</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>
    <?php $get_id = $_GET['id']; ?>
    <?php 
	  $post_id = $_GET['post_id'];
	  if($post_id == ''){
	  ?>
    <script>
    window.location = "admin/task.php<?php echo '?id='.$get_id; ?>";
    </script>
    <?php
	  }
	
 ?>

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
                            $task_status = array("Pending","On-Progress","Over Due","Done");
                            $class_query = mysqli_query($conn,"SELECT * FROM tbl_teacher_class
										LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id
                                        LEFT JOIN tbl_school_year ON tbl_school_year.school_year_id = tbl_teacher_class.school_year_id
										where teacher_class_id = '$get_id'")or die(mysqli_error());
										$class_row = mysqli_fetch_array($class_query);
                                        $teacher_id = $class_row['teacher_id'];
										?>

                            <li class="breadcrumb-item"><a href="#"><?php echo $class_row['class_name']; ?></a> <span
                                    class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $class_row['school_year']; ?></a> <span class="divider"></span></li>
                            <li class="breadcrumb-item active"><a href="#"><b>Tasks</b></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Submit Task</h3>
                            </div>
                            <form id="add_task" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="exampleInputFile">Task</label>
                                                <div class="custom-file">
                                                    <input name="uploaded_file" type="file" class="custom-file-input"
                                                        id="formFileMultiple" multiple required></input>
                                                    <label for="formFileMultiple" class="custom-file-label">Choose File
                                                    </label>
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                                    <input type="hidden" name="id" value="<?php echo $post_id; ?>" />
                                                    <input type="hidden" name="get_id" value="<?php echo $get_id; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Task Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter activity name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Description (Optional)</label>
                                                <textarea id="summernote" class="form-control" name="desc" rows="4"
                                                    placeholder="Enter description"></textarea>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex w-100 justify-content-center align-items-center">
                                            <?php 
                                            $query = mysqli_query(
                                            $conn,
                                            "SELECT * FROM tbl_student_task WHERE student_id  =  '$session_id' AND task_id  =  '$post_id' "
                                            ) or die(mysqli_error());
                                            $count = mysqli_num_rows($query);

                                            if ($count > 0) {  
                                                echo "<center><button type='submit'
                                                    class='btn btn-secondary' disabled>Submitted</button></center>";
                                               } else { 
                                            ?>
                                            <center><button name="upload" type="submit" value="Upload"
                                                    class="btn btn-success">Submit</button></center>
                                            <?php }  ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php
							$query = mysqli_query($conn,"SELECT * FROM tbl_task where task_id = '$post_id' ")or die(mysqli_error());
							$row = mysqli_fetch_array($query);		
						?>
                        <div class="callout callout-success">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <dl>
                                            <dt><b class="border-bottom border-success">Task Name</b></dt>
                                            <dd><?php  echo $row['task_name']; ?></dd>
                                            <dt><b class="border-bottom border-success">Instruction</b></dt>
                                            <dd><?php  echo $row['task_desc']; ?></dd>
                                            <dt><b class="border-bottom border-success">Points</b></dt>
                                            <dd><span
                                                    class="badge badge-success"><?php  echo $row['total_points']; ?></span>
                                            </dd>
                                            <dt><b class="border-bottom border-success">Due Date</b></dt>
                                            <dd><?php $end_date = date_create($row['end_date']);
                                                    echo date_format(
                                                    $end_date,
                                                    'F d, Y h:i A'
                                                    ); ?></dd>
                                            <dt><b class="border-bottom border-success">Time Left</b></dt>
                                            <dd id="<?php echo $row[
                                                'task_id'
                                                ]; ?>-running-due">
                                                <script>
                                                $(document).ready(function() {
                                                    setInterval(() => {
                                                        calculateTimeLeft(
                                                            '<?php echo $row[
                                                                'task_id'
                                                            ]; ?>-running-due',
                                                            '<?php echo $row[
                                                                'end_date'
                                                            ]; ?>'
                                                        );
                                                    }, 1000)
                                                })
                                                </script>
                                            </dd>
                                        </dl>
                                    </div>
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
                                <a href="task_student.php<?php echo '?id='.$get_id; ?>">
                                    <i class="fas fa-arrow-left"></i> Back</a>
                            </div>
                            <div class="card-body">
                                <?php
								$query = mysqli_query($conn,"select * FROM tbl_task where task_id = '$post_id' ")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
									
							?>
                                <div class="alert alert-primary">Submit Activity in :
                                    <b><?php echo $row['task_name']; ?></b>
                                </div>
                                <?php
							$query = mysqli_query($conn,"SELECT * FROM tbl_student_task
							LEFT JOIN tbl_student on tbl_student.student_id  = tbl_student_task.student_id 
							where task_id = '$post_id' and tbl_student.student_id = '$session_id' order by task_date_upload DESC")or die(mysqli_error());
							while($row = mysqli_fetch_array($query)){
							$id  = $row['student_task_id'];
							$student_id = $row['student_id'];
						    ?>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <dl>
                                                <dt><b class="border-bottom border-success">Date Submitted</b></dt>
                                                <dd><?php $task_date_upload = date_create($row['task_date_upload']);
                                                    echo date_format(
                                                    $task_date_upload,
                                                    'F d, Y h:i A'
                                                    ); ?></dd>
                                                <dt><b class="border-bottom border-success">Task Name</b></dt>
                                                <dd><?php  echo $row['task_name']; ?></dd>
                                                <dt><b class="border-bottom border-success">Description</b></dt>
                                                <dd><?php  echo $row['task_description']; ?></dd>
                                            </dl>
                                        </div>
                                        <div class="col-md-6">
                                            <dl>
                                                <dt><b class="border-bottom border-success">File Uploaded</b></dt>
                                                <dd>
                                                    <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                                                        <li>
                                                            <span class="mailbox-attachment-icon has-img"><img
                                                                    src="<?php echo $row['task_file']; ?>"
                                                                    alt="Attachment" style="height:100px;width:200px">
                                                                <div class="mailbox-attachment-info">
                                                                    <a href="<?php echo $row['task_file']; ?>"
                                                                        class="mailbox-attachment-name" target="_blank">
                                                                        <h6><i
                                                                                class="fas fa-paperclip"></i><?php echo $row['task_name']; ?>
                                                                        </h6>
                                                                    </a>
                                                                </div>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </dd>
                                                <dt><b class="border-bottom border-success">Status</b></dt>
                                                <dd><?php
                            					if($task_status[$row['task_status']] =='Pending'){
                              						echo "<span class='badge badge-secondary'>{$task_status[$row['task_status']]}</span>";
                            					}elseif($task_status[$row['task_status']] =='On-Progress'){
                              						echo "<span class='badge badge-primary'>{$task_status[$row['task_status']]}</span>";
                            					}elseif($task_status[$row['task_status']] =='Over Due'){
                              						echo "<span class='badge badge-danger'>{$task_status[$row['task_status']]}</span>";
                            					}elseif($task_status[$row['task_status']] =='Done'){
                              						echo "<span class='badge badge-success'>{$task_status[$row['task_status']]}</span>";
                            					}
                          						?>
                                                </dd>
                                                <dt><b class="border-bottom border-success">Feedback</b></dt>
                                                <dd><?php echo $row['feedback']; ?></dd>
                                                <dt><b class="border-bottom border-success">Points</b></dt>
                                                <?php if ($session_id == $student_id){ ?>
                                                <?php
                                                $query = mysqli_query(
                                                $conn,
                                                 "SELECT
                                                    *
                                                    FROM
                                                        tbl_student_task
                                                    LEFT JOIN tbl_student ON tbl_student.student_id = tbl_student_task.student_id
                                                    INNER JOIN tbl_task ON tbl_student_task.task_id = tbl_task.task_id
                                                    WHERE
                                                        tbl_task.class_id = '$get_id' AND tbl_student_task.task_id = '$post_id' AND tbl_student.student_id = '$student_id'
                                                    "
                                                ) or die(mysqli_error());
                                                while (
                                                $row = mysqli_fetch_array($query)
                                                ) {
                                                $student_id = $row['student_id']; 
                                                ?>
                                                <dd><span class="badge badge-success"><?php  echo $row['grade']; ?> /
                                                        <?php  echo $row['total_points']; ?></span></dd>
                                                <?php 
                                                    }
                                                }
                                                ?>
                                            </dl>
                                            <div class="card-footer float-right">
                                                <a class="btn btn-success"
                                                    href="edit_task_modal.php<?php echo '?student_task_id='.$id.'&id='.$get_id.'&post_id='.$post_id ?>"><i
                                                        class="fas fa-edit"></i> Edit</a>
                                                <a class="btn btn-danger float-right"
                                                    data-target="#delete<?php echo $id; ?>" data-toggle="modal"><i
                                                        class=" fas fa-trash"></i> Delete</a>
                                                <?php include 'delete-task-modal.php'; ?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
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
        $("#add_task").submit(function(e) {
            e.preventDefault();
            var _this = $(e.target);
            var formData = new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: "admin/upload_task.php",
                data: formData,
                success: function(html) {
                    toastr.success("Success", "Activity Successfully Uploaded");
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 100
        });
        $('.delete-task').click(function() {

            var id = $(this).attr("id");
            $.ajax({
                type: "POST",
                url: "delete-task.php",
                data: ({
                    id: id
                }),
                cache: false,
                success: function(html) {
                    $("#delete" + id).fadeOut('slow',
                        function() {
                            $(this).remove();
                        });
                    $('#' + id).modal('hide');
                    toastr.error("Deleted", "Task Successfully Deleted.");
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                },
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

        $(`#${targetElement}`).html(days + " days " + hours + " hours " + minutes + " minutes " +
            seconds +
            " seconds ");
    }
    </script>
</body>

</html>