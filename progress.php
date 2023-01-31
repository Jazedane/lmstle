<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Progress</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>
    <?php $get_id = $_GET['id']; ?>

</head>

<body>
    <?php include 'homepage2.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <?php 
                	$task_status = array("Pending","On-Progress","Over Due","Done");
					$class_query = mysqli_query($conn,"SELECT * FROM tbl_teacher_class
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
                                            <th>
                                                <center>Task Name</center>
                                            </th>
                                            <th>Status</th>
                                            <th>
                                                <center>Feedback</center>
                                            </th>
                                            <th>Points</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php
										$query = mysqli_query($conn,"SELECT * FROM tbl_student_task 
										LEFT JOIN tbl_student on tbl_student.student_id  = tbl_student_task.student_id
										WHERE tbl_student_task.student_id = '$session_id'
										order by task_date_upload")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
										$id  = $row['student_task_id'];
										$student_id = $row['student_id'];
									?>
                                        <tr>
                                            <td width="250"><?php $task_date_upload = date_create($row['task_date_upload']);
                                                    echo date_format(
                                                    $task_date_upload,
                                                    'F d, Y h:i A'
                                                    ); ?>
                                            </td>
                                            <td>
                                                <center><?php  echo $row['task_name']; ?></center>
                                            </td>
                                            <td class="project-state" width="40">
                                                <center>
                                                    <?php
                            					if($task_status[$row['task_status']] =='Pending'){
                              						echo "<span class='badge badge-secondary'>{$task_status[$row['task_status']]}</span>";
                            					}elseif($task_status[$row['task_status']] =='On-Progress'){
                              						echo "<span class='badge badge-primary'>{$task_status[$row['task_status']]}</span>";
                            					}elseif($task_status[$row['task_status']] =='Over Due'){
                              						echo "<span class='badge badge-danger'>{$task_status[$row['task_status']]}</span>";
                            					}elseif($task_status[$row['task_status']] =='Done'){
                              						echo "<span class='badge badge-success'>{$task_status[$row['task_status']]}</span>";
                            					}
                          						?></center>
                                            </td>
                                            <td>
                                                <center><?php  echo $row['feedback']; ?><center>
                                            </td>
                                            <?php if ($session_id == $student_id){ ?>
                                            <td width="40">
                                                <center>
                                                    <span
                                                        class="badge badge-success"><?php echo $row['grade']; ?></span>
                                                </center>
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
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "order": [
                [0, 'desc']
            ],
            "buttons": ["copy", "excel", "pdf", {
                extend: 'print',
                exportOptions: {
                    columns: [0, 1, 2, 4]
                },
                title: '<div class="text-center"><h5><b>STUDENT PROGRESS</b></h5></div><div><h6>Name: <b><?php ($query = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbl_student WHERE isDeleted=false AND student_id=$session_id ORDER BY lastname"
                                            )) or die(mysqli_error());
                                            while (
                                                $row = mysqli_fetch_array(
                                                    $query
                                                )
                                            ) {
                                                $id = $row['student_id']; ?><?php $middlename = $row['middlename']; echo $row['firstname'] ." ". $middlename = mb_substr($middlename, 0, 1) .". ". $row['lastname'];?></b> <p class="float-right">Year And Section : <b><?php echo $class_row['class_name']?></b></p></h6></div><div><h6>ID Number : <b><?php echo $row['username']?></b><p align="right">Date: <b><?php date_default_timezone_set('Singapore'); echo $date= date('F d, Y');?></b></p></h6></div><?php } ?>',
                customize: function(win) {
                    $(win.document.body)
                        .css('font-size', '10pt')
                        .prepend(
                            '<div class="text-center"><img src="http://localhost/lmstlee4/admin/dist/img/logo.png" style="width: 80px; height: 70px;position:absolute; top:0; left:240px;" alt="logo"/><h4><b>Bug-Ang National High School</b></h4><p><h6>Brgy. Bug-Ang, Toboso, Negros Occidental </h6></p></div><div><hr style="border-bottom: 3px solid black"></hr></div>'
                        );
                    $(win.document.body).find(
                            'table')
                        .addClass('compact')
                        .css('font-size',
                            'inherit');
                }
            }]
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
    $(document).ready(function() {
        $('.dataTables_filter input[type="search"]').css({
            'width': '220px',
            'display': 'inline-block'
        });
    });
    </script>
</body>

</html>