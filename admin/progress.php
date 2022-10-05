<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
    <?php include('sidebar2.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span5" id="content">
                <div class="row-fluid">

                    <?php 
					$i = 1;
                	$task_status = array("Pending","Started","On-Progress","On-Hold","Over Due","Done");
					$class_query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_class_id = '$get_id'")or die(mysqli_error());
										$class_row = mysqli_fetch_array($class_query);
										$class_id = $class_row['class_id'];
										$school_year = $class_row['school_year'];
										?>

                    <ul class="breadcrumb">
                        <li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
                        <li><a href="#">School Year: <?php echo $class_row['school_year']; ?></a> <span
                                class="divider">/</span></li>
                        <li><a href="#"><b>Progress</b></a></li>
                    </ul>

                    <div id="block_bg" class="block" style="width: 200%">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left">
                                <h4> Student Task Progress</h4>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

                                    <thead>
                                        <tr>
                                            <th>Date Upload</th>
                                            <th>Student Name</th>
                                            <th>Task</th>
                                            <th>Due Date</th>
                                            <th>Progress</th>
                                            <th>Status</th>
                                            <th>Grade</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
										$query = mysqli_query($conn,"select * FROM student_task 
										LEFT JOIN student on student.student_id  = student_task.student_id
										RIGHT JOIN task on student_task.task_id  = task.task_id
										WHERE student_task.student_id = '$session_id'
										order by task_fdatein DESC")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
										$id  = $row['student_task_id'];
										$student_id = $row['student_id'];
										?>
                                        <tr>
                                            <td><?php echo $row['fdatein']; ?></td>
                                            <td><?php echo $row['firstname']; ?>" "<?php echo $row['lastname']; ?></td>
                                            <td><?php  echo $row['fname']; ?></td>
                                            <td><?php  echo $row['end_date']; ?></td>
                                            <td class="project_progress">
                                                <div class="progress progress-sm" style="border:1px solid black">
                                                    <div class="progress-bar bg-green" role="progressbar"
                                                        aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: <?php echo $prog ?>%">
                                                    </div>
                                                </div>
                                                <center>
                                                    <?php echo $prog ?>% Complete
                                                </center>
                                            </td>
                                            <td class="project-state">
                                                <?php
                            					if($task_status[$row['task_status']] =='Pending'){
                              						echo "<span class='badge badge-secondary'>{$task_status[$row['task_status']]}</span>";
                            					}elseif($task_status[$row['task_status']] =='Started'){
                              						echo "<span class='badge badge-primary'>{$task_status[$row['task_status']]}</span>";
                            					}elseif($task_status[$row['stask_status']] =='On-Progress'){
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
        </div>
    </div>
    <?php include('footer.php'); ?>
    </div>
    <?php include('script.php'); ?>
</body>

</html>