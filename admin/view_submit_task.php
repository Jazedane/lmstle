<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php 
	  $post_id = $_GET['post_id'];
	  if($post_id == ''){
	  ?>
<script>
window.location = "/lmstle/task_student.php<?php echo '?id='.$get_id; ?>";
</script>
<?php
	  }
	
 ?>

<body id="studentTableDiv">
    <?php include('sidebar2.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span9" id="content">
                <div class="row-fluid">

                    <?php 
                    $task_status = array("Pending","Started","On-Progress","On-Hold","Over Due","Done");
                    $class_query = mysqli_query($conn,"select * from teacher_class
									LEFT JOIN class ON class.class_id = teacher_class.class_id
									where teacher_class_id = '$get_id'")or die(mysqli_error());
									$class_row = mysqli_fetch_array($class_query);
									?>

                    <ul class="breadcrumb">
                        <li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
                        <li><a href="#">School Year: <?php echo $class_row['school_year']; ?></a> <span
                                class="divider">/</span></li>
                        <li><a href="#"><b>Uploaded Tasks</b></a></li>
                    </ul>

                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-right"><a href="task.php<?php echo '?id='.$get_id; ?>">
                                    <i class="fa-solid fa-arrow-left"></i> Back</a>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <?php
										$query = mysqli_query($conn,"select * FROM task where task_id = '$post_id'")or die(mysqli_error());
										$row = mysqli_fetch_array($query);
									
									?>
                                <div class="alert alert-info">Submit Task in : <?php echo $row['fname']; ?></div>

                                <div id="">


                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="">

                                        <thead>
                                            <tr>
                                                <th>Date Upload</th>
                                                <th>Task Name</th>
                                                <th>Description</th>
                                                <th>Due Date</th>
                                                <th>Progress</th>
                                                <th>Status</th>
                                                <th>Submitted by:</th>
                                                <th></th>
                                                <th></th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                            <?php
										$query = mysqli_query($conn,"select * FROM student_task
										LEFT JOIN student on student.student_id  = student_task.student_id
										where task_id = '$post_id'  order by task_fdatein DESC")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
										$id  = $row['student_task_id'];
									?>
                                            <tr>
                                                <td><?php echo $row['task_fdatein']; ?></td>
                                                <td><?php  echo $row['fname']; ?></td>
                                                <td><?php echo $row['fdesc']; ?></td>
                                                <td><?php echo $row['end_date']; ?></td>
                                                <td class="project_progress">
                                                    <div class="progress progress-sm" style="border:1px solid black">
                                                        <div class="progress-bar bg-green" role="progressbar"
                                                            aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: %">
                                                        </div>
                                                        <small>
                                                            % Complete
                                                        </small>
                                                    </div>
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
                                                <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                                <td><a href="<?php echo $row['floc']; ?>"><i
                                                            class="fa-solid fa-download"></i></a></td>
                                                <td width="140">
                                                    <form method="post" action="save_grade.php">
                                                        <input type="hidden" class="span4" name="id"
                                                            value="<?php echo $id; ?>">
                                                        <input type="hidden" class="span4" name="post_id"
                                                            value="<?php echo $post_id; ?>">
                                                        <input type="hidden" class="span4" name="get_id"
                                                            value="<?php echo $get_id; ?>">
                                                        <input type="text" class="span4" name="grade"
                                                            value="<?php echo $row['grade']; ?>">
                                                        <button name="save" class="btn btn-success" id="btn_s"><i
                                                                class="fa-solid fa-save"></i> Save</button>
                                                    </form>
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
        </div>
        <?php include('footer.php'); ?>
    </div>
    <?php include('script.php'); ?>
</body>

</html>