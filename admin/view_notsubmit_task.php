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
                            <li class="muted pull-right">
                                <a href="print_student_task.php<?php echo '?id='.$get_id; ?>" class="btn btn-info"><i
                                        class="fa-solid fa-list"></i> Student Task List</a>
                            </li>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <div id="">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

                                        <thead>
                                            <tr>
                                                <th>Student Name</th>
                                                <th>Task Name</th>
                                                <th>Description</th>
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
                                                <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                                <td><?php  echo $row['fname']; ?></td>
                                                <td><?php echo $row['fdesc']; ?></td>
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
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
    <?php include('script.php'); ?>
</body>

</html>