<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Progress</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php $get_id = $_GET['id']; ?>

</head>

<body>
    <?php include 'homepage2.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <?php 
                	$task_status = array("Pending","Started","On-Progress","On-Hold","Over Due","Done");
					$class_query = mysqli_query($conn,"select * from tbl_teacher_class
										LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id
                                        LEFT JOIN tbl_school_year ON tbl_school_year.school_year_id = tbl_teacher_class.school_year_id
										where teacher_class_id = '$get_id'")or die(mysqli_error());
										$class_row = mysqli_fetch_array($class_query);
										$class_id = $class_row['class_id'];
										$school_year = $class_row['school_year'];
										?>
                    <div class="col-sm-6">
                        <h1>Progress</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"><?php echo $class_row['class_name']; ?></a> <span
                                    class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $class_row['school_year']; ?></a> <span class="divider"></span></li>
                            <li class="breadcrumb-item active"><a href="#"><b>Progress</b></a></li>
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
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date Submitted</th>
                                            <th>Task Name</th>
                                            <th>Status</th>
                                            <th>Feedback</th>
                                            <th>Points</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php
										$query = mysqli_query($conn,"SELECT * FROM tbl_student_task 
										LEFT JOIN tbl_student on tbl_student.student_id  = tbl_student_task.student_id
										WHERE tbl_student_task.student_id = '$session_id' and tbl_student_task.isDeleted='false'
										order by task_fdatein DESC")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
										$id  = $row['student_task_id'];
										$student_id = $row['student_id'];
									?>
                                        <tr>
                                            <td><?php echo $row['task_fdatein']; ?></td>
                                            <td><?php  echo $row['fname']; ?></td>
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
                                            <td><?php  echo $row['feedback']; ?></td>
                                            <?php if ($session_id == $student_id){ ?>
                                            <td>
                                                <span class="badge badge-success"><?php echo $row['grade']; ?></span>
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