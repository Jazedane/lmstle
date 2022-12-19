<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Task</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>
    <?php $get_id = $_GET['id']; ?>
    <?php 
	  $post_id = $_GET['post_id'];
	  if($post_id == ''){
	  ?>
    <script>
    window.location = "/lmstlee4/task_student.php<?php echo '?id='.$get_id; ?>";
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
                        <?php 
                        $task_status = array("Pending","On-Progress","Over Due","Done");
                        $p_condition = array("Alive","Withered","Dead");
                        $class_query = mysqli_query($conn,"select * from tbl_teacher_class
										LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id
                                        LEFT JOIN tbl_school_year ON tbl_school_year.school_year_id = tbl_teacher_class.school_year_id
										where teacher_class_id = '$get_id'")or die(mysqli_error());
										$class_row = mysqli_fetch_array($class_query);
										?>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"><?php echo $class_row['class_name']; ?></a> <span
                                    class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $class_row['school_year']; ?></a> <span class="divider"></span></li>
                            <li class="breadcrumb-item active"><a href="#"><b>View Submitted Task</b></a></li>
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
                                <div id="" class="float-sm-right"><a href="task.php<?php echo '?id='.$get_id; ?>"><i
                                            class="fas fa-arrow-left"></i> Back</a></div>
                            </div>
                            <div class="card-body">
                                <?php
										$query1 = mysqli_query($conn,"select * FROM tbl_task where task_id = '$post_id'")or die(mysqli_error());
										$row1 = mysqli_fetch_array($query1);
									
									?>
                                <div class="alert alert-primary">Submit Task in : <b><?php echo $row1['task_name']; ?></b></div>

                                <div id="">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Date Submitted</th>
                                                <th>Task Name</th>
                                                <th>Description</th>
                                                <th>Submitted by:</th>
                                                <th>Status</th>
                                                <th>Attachment</th>
                                                <th>Points</th>
                                                <th>Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                            <?php
										    $query = mysqli_query($conn,"SELECT * FROM tbl_student_task
										    LEFT JOIN tbl_student on tbl_student.student_id  = tbl_student_task.student_id and tbl_student_task.isDeleted=false 
										    where task_id = '$post_id' order by task_date_upload DESC")or die(mysqli_error());
										    while($row = mysqli_fetch_array($query)){
										    $id  = $row['student_task_id'];
                                            $student_id = $row['student_id'];
                                            $task_name = $row['task_name'];
									        ?>
                                            <tr>
                                                <td width="220"><?php $task_date_upload = date_create($row['task_date_upload']);
                                                    echo date_format(
                                                    $task_date_upload,
                                                    'F d, Y h:i A'
                                                    ); ?>
                                                </td>
                                                <td><?php  echo $row['task_name']; ?></td>
                                                <td><?php echo $row['task_description']; ?></td>
                                                <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                                <td class="project-state" width="60">
                                                    <?php
                            					if($row['task_status'] =='0') {
                              						echo "<span class='badge badge-secondary'>Pending</span>";
                            					}elseif($row['task_status'] =='1'){
                              						echo "<span class='badge badge-info'>On-Progress</span>";
                            					}elseif($row['task_status'] =='2'){
                              						echo "<span class='badge badge-danger'>Overdue</span>";
                            					}elseif($row['task_status'] =='3'){
                              						echo "<span class='badge badge-success'>Done</span>";
                            					}
                                                ?>
                                                </td>
                                                <td width="100"><a href="<?php echo $row['task_file']; ?>" target="_blank"><i
                                                            class="fas fa-paperclip"></i> <i>Attachment</i></a></td>
                                                <td width="40"><span class="badge badge-success"><?php  echo $row['grade']; ?></span></td>
                                                <td width="40">
                                                    <a class="btn btn-success"
                                                        href="edit_task_modal.php<?php echo '?student_task_id='.$id.'&id='.$get_id.'&post_id='.$post_id ?>"><i
                                                            class="fas fa-edit"></i></a>
                                                </td>
                                            </tr>
                                            <?php 
                                                }
                                                
                                            ?>

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