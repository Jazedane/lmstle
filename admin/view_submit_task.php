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
            <div class="span11" id="content">
                <div class="row-fluid">

                    <?php 
                    $task_status = array("Pending","Started","On-Progress","On-Hold","Over Due","Done");
                    $p_condition = array("Alive","Withered","Dead");
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
                            <div id="" class="muted pull-left"><a href="task.php<?php echo '?id='.$get_id; ?>">
                                    <i class="fa-solid fa-arrow-left"></i> Back</a>
                            </div>
                            <li id="" class="pull-right">
                                <a href="print_student_task.php<?php echo '?id='.$get_id; ?>" class="btn btn-info"><i
                                        class="fa-solid fa-list"></i> Student Task List</a>
                            </li>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <?php
										$query = mysqli_query($conn,"select * FROM task where task_id = '$post_id'")or die(mysqli_error());
										$row = mysqli_fetch_array($query);
									
									?>
                                <div class="alert alert-info">Submit Task in : <?php echo $row['fname']; ?></div>

                                <div id="">


                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

                                        <thead>
                                            <tr>
                                                <th>Date Upload</th>
                                                <th>Task Name</th>
                                                <th>Description</th>
                                                <th>Submitted by:</th>
                                                <th>Status</th>
                                                <th>Condition</th>
                                                <th>Action</th>
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
                                            $student_id = $row['student_id'];
                                            $task_name = $row['fname'];
									        ?>
                                            <tr>
                                                <td><?php echo $row['task_fdatein']; ?></td>
                                                <td><?php  echo $row['fname']; ?></td>
                                                <td><?php echo $row['fdesc']; ?></td>
                                                <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                                <td class="project-state">
                                                    <?php
                            					if($row['task_status'] =='1') {
                              						echo "<span class='badge badge-secondary'>Pending</span>";
                            					}elseif($row['task_status'] =='2'){
                              						echo "<span class='badge badge-primary'>Started</span>";
                            					}elseif($row['task_status'] =='3'){
                              						echo "<span class='badge badge-info'>On-Progress</span>";
                            					}elseif($row['task_status'] =='4'){
                              						echo "<span class='badge badge-secondary'>On-Hold</span>";
                            					}elseif($row['task_status'] =='5'){
                              						echo "<span class='badge badge-warning'>Overdue</span>";
                            					}elseif($row['task_status'] =='6'){
                              						echo "<span class='badge badge-success'>Done</span>";
                            					}
                                                ?>
                                                </td>
                                                <td class="project-state">
                                                    <?php
                            					if($row['p_condition'] =='1'){
                              						echo "<span class='badge badge-success'>Alive</span>";
                            					}elseif($row['p_condition'] =='2'){
                              						echo "<span class='badge badge-primary'>Withered</span>";
                            					}elseif($row['p_condition'] =='3'){
                              						echo "<span class='badge badge-warning'>Dead</span>";
                                                }
                                                ?>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button name="action" href="#" class="btn btn-info"
                                                            data-toggle="dropdown"></i>Action <i class="caret"></i>
                                                        </button>
                                                        <ul class="dropdown-menu text-center"
                                                            style="width:20px; height:60px">
                                                            <li><a href="./edit_task_modal.php<?php echo '?student_task_id='.$id.'&id='.$get_id.'&post_id='.$post_id ?>"><i
                                                                        class="fa-solid fa-edit"></i>
                                                                    Edit </a></li>
                                                            <li><a href="/remove_task_modal.php?task_id=$id"><i
                                                                        class="fa-solid fa-trash-can"></i>
                                                                    Delete </a></li>
                                                        </ul>
                                                    </div>
                                                </td>
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
                                                        <input type="hidden" class="span4" name="student_id"
                                                            value="<?php echo $student_id; ?>">
                                                        <input type="hidden" class="span4" name="task_name"
                                                            value="<?php echo $task_name; ?>">
                                                        <input type="number" maxlength="3" min="75" max="100" class="span4" name="grade"
                                                            value="<?php echo $row['grade']; ?>%" style="width:60px">
                                                        <button name="save" class="btn btn-success" id="btn"><i
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
                <script type="text/javascript">
                $(document).ready(function() {
                    $('.remove').click(function() {
                        var id = $(this).attr("id");
                        $.ajax({
                            type: "POST",
                            url: "remove_task.php",
                            data: ({
                                id: id
                            }),
                            cache: false,
                            success: function(html) {
                                $("#del" + id).fadeOut('slow', function() {
                                    $(this).remove();
                                });
                                $('#' + id).modal('hide');
                                $.jGrowl("The Student Task is Successfully Deleted", {
                                    header: 'Data Delete'
                                });
                            }
                        });
                        return false;
                    });
                });
                </script>
                <script>
                jQuery(document).ready(function() {
                    jQuery("#edit_task").submit(function(e) {
                        e.preventDefault();
                        var id = $('.edit').attr("id");
                        var _this = $(e.target);
                        var formData = jQuery(this).serialize();
                        $.ajax({
                            type: "POST",
                            url: "edit.php",
                            data: formData,
                            success: function(html) {
                                $.jGrowl(
                                    "Edited Task Successfully", {
                                        header: 'Edited'
                                    });
                                $('#edit_task' + id).modal('hide');
                            }

                        });
                        return false;
                    });
                });
                </script>

            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
    <?php include('script.php'); ?>
</body>

</html>