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
                            $task_status = array("Pending","Started","On-Progress","On-Hold","Over Due","Done");
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
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Add Task</h3>
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
                                                <label>Description</label>
                                                <textarea id="summernote" class="form-control" name="desc" rows="4"
                                                    placeholder="Enter description" auto-complete="off"></textarea>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex w-100 justify-content-center align-items-center">
                                            <center><button name="Upload" type="submit" value="Upload"
                                                    class="btn btn-success">Submit</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                                <div id="" class="float-sm-left"><a
                                        href="task_student.php<?php echo '?id='.$get_id; ?>">
                                        <i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php
										$query = mysqli_query($conn,"select * FROM tbl_task where task_id = '$post_id' ")or die(mysqli_error());
										$row = mysqli_fetch_array($query);
									
									?>
                                <div class="alert alert-primary">Submit Activity in :
                                    <b><?php echo $row['fname']; ?></b></div>
                                <div id="">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Date Upload</th>
                                                <th>Activity Name</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Submitted by:</th>
                                                <th>Feedback</th>
                                                <th>Points</th>
                                                <th>Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                            <?php
										$query = mysqli_query($conn,"select * FROM tbl_student_task
										LEFT JOIN tbl_student on tbl_student.student_id  = tbl_student_task.student_id
										where task_id = '$post_id' order by task_fdatein DESC")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
										$id  = $row['student_task_id'];
										$student_id = $row['student_id'];
									    ?>
                                            <tr>
                                                <td><?php $task_fdatein = date_create($row['task_fdatein']);
                                                    echo date_format(
                                                    $task_fdatein,
                                                    'M/d/Y h:i a'
                                                    ); ?>
                                                </td>
                                                <td><?php  echo $row['fname']; ?></td>
                                                <td><?php echo $row['fdesc']; ?></td>
                                                <td class="project-state">
                                                    <?php
                            					if($task_status[$row['task_status']] =='Pending'){
                              						echo "<span class='badge badge-secondary'>{$task_status[$row['task_status']]}</span>";
                            					}elseif($task_status[$row['task_status']] =='Started'){
                              						echo "<span class='badge badge-primary'>{$task_status[$row['task_status']]}</span>";
                            					}elseif($task_status[$row['task_status']] =='On-Progress'){
                              						echo "<span class='badge badge-info'>{$task_status[$row['task_status']]}</span>";
                            					}elseif($task_status[$row['task_status']] =='On-Hold'){
                              						echo "<span class='badge badge-warning'>{$task_status[$row['task_status']]}</span>";
                            					}elseif($task_status[$row['task_status']] =='Over Due'){
                              						echo "<span class='badge badge-danger'>{$task_status[$row['task_status']]}</span>";
                            					}elseif($task_status[$row['task_status']] =='Done'){
                              						echo "<span class='badge badge-success'>{$task_status[$row['task_status']]}</span>";
                            					}
                          						?>
                                                </td>
                                                <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                                <td><?php echo $row['feedback']; ?></td>
                                                <?php if ($session_id == $student_id){ ?>
                                                <?php
                                            ($query = mysqli_query(
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
                                                )) or die(mysqli_error());
                                            while (
                                                $row = mysqli_fetch_array($query)
                                            ) {
                                                $student_id = $row['student_id']; 
                                            ?>
                                                <td><span class="badge badge-success"><?php  echo $row['grade']; ?> /
                                                        <?php  echo $row['total_points']; ?></span></td>
                                                <?php 
                                                    }
                                                }
                                            ?>
                                                <td>
                                                    <a class="btn btn-success"
                                                        href="edit_task_modal.php<?php echo '?student_task_id='.$id.'&id='.$get_id.'&post_id='.$post_id ?>"><i
                                                            class="fas fa-edit"></i> Edit</a>
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
                    toastr.success("Activity Successfully Uploaded");
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
</body>

</html>