<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Task</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
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
                            $class_query = mysqli_query($conn,"select * from tbl_teacher_class
										LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id
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
                    <div class="col-md-3">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Add Task</h3>
                            </div>
                            <form id="add_task" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="control-label" for="inputEmail">Activity</label>
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label">
                                                <input name="uploaded_file" class="form-control" type="file"
                                                    id="formFileMultiple" multiple></input>
                                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                                <input type="hidden" name="id" value="<?php echo $post_id; ?>" />
                                                <input type="hidden" name="get_id" value="<?php echo $get_id; ?>" />
                                        </div>
                                    </div>
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
                                <div class="alert alert-info">Submit Task in : <?php echo $row['fname']; ?></div>
                                <div id="">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Date Upload</th>
                                                <th>Task Name</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Submitted by:</th>
                                                <th>Feedback</th>
                                                <th>Points</th>
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
                                                <td><?php echo $row['task_fdatein']; ?></td>
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
                                                <td>
                                                    <span class="badge badge-success"><?php echo $row['grade']; ?> points</span>
                                                </td>
                                                <?php }else{ ?>
                                                <td></td>
                                                <?php } ?>
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
    <?php include 'script.php'; ?>
    <script>
    jQuery(document).ready(function($) {
        $("#add_task").submit(function(e) {
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