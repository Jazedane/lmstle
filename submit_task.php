<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php 
	  $post_id = $_GET['post_id'];
	  if($post_id == ''){
	  ?>
<script>
window.location = "task_student.php<?php echo '?id='.$get_id; ?>";
</script>
<?php
	  }
	
 ?>

<body id="studentTableDiv">
    <?php include('sidebar2.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6" id="content">
                <div class="row-fluid">

                    <?php $class_query = mysqli_query($conn,"select * from teacher_class
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
                            <div id="" class="muted pull-right"><a href="task_student.php<?php echo '?id='.$get_id; ?>">
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
                                                <th>Status</th>
                                                <th>Submitted by:</th>
                                                <th>Grade</th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                            <?php
										$query = mysqli_query($conn,"select * FROM student_task
										LEFT JOIN student on student.student_id  = student_task.student_id
										where task_id = '$post_id'  order by task_fdatein DESC")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
										$id  = $row['student_task_id'];
										$student_id = $row['student_id'];
									?>
                                            <tr>
                                                <td><?php echo $row['task_fdatein']; ?></td>
                                                <td><?php  echo $row['fname']; ?></td>
                                                <td><?php echo $row['fdesc']; ?></td>
                                                <td></td>
                                                <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                                <?php if ($session_id == $student_id){ ?>
                                                <td>
                                                    <span
                                                        class="badge badge-success"><?php echo $row['grade']; ?></span>
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
            <?php include('submit_task_sidebar.php') ?>
        </div>
        <?php include('footer.php'); ?>
    </div>
    <?php include('script.php'); ?>
</body>

</html>