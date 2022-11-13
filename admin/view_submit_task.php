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
                        $task_status = array("Pending","Started","On-Progress","On-Hold","Over Due","Done");
                        $p_condition = array("Alive","Withered","Dead");
                        $class_query = mysqli_query($conn,"select * from tbl_teacher_class
										LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id
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
                                <div class="alert alert-primary">Submit Task in : <?php echo $row1['fname']; ?></div>

                                <div id="">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Date Submitted</th>
                                                <th>Task Name</th>
                                                <th>Description</th>
                                                <th>Submitted by:</th>
                                                <th>Status</th>
                                                <th>Condition</th>
                                                <th>Attachment</th>
                                                <th>Points</th>
                                                <th>Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                            <?php
										    $query = mysqli_query($conn,"select * FROM tbl_student_task
										    LEFT JOIN tbl_student on tbl_student.student_id  = tbl_student_task.student_id and tbl_student_task.isDeleted=false 
										    where task_id = '$post_id' order by task_fdatein DESC")or die(mysqli_error());
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
                            					if($row['task_status'] =='0') {
                              						echo "<span class='badge badge-secondary'>Pending</span>";
                            					}elseif($row['task_status'] =='1'){
                              						echo "<span class='badge badge-primary'>Started</span>";
                            					}elseif($row['task_status'] =='2'){
                              						echo "<span class='badge badge-info'>On-Progress</span>";
                            					}elseif($row['task_status'] =='3'){
                              						echo "<span class='badge badge-warning'>On-Hold</span>";
                            					}elseif($row['task_status'] =='4'){
                              						echo "<span class='badge badge-danger'>Overdue</span>";
                            					}elseif($row['task_status'] =='5'){
                              						echo "<span class='badge badge-success'>Done</span>";
                            					}
                                                ?>
                                                </td>
                                                <td class="project-state">
                                                    <?php
                            					if($row['p_condition'] =='0'){
                              						echo "<span class='badge badge-secondary'>Pending</span>";
                            					}elseif($row['p_condition'] =='1'){
                              						echo "<span class='badge badge-success'>Alive</span>";
                            					}elseif($row['p_condition'] =='2'){
                              						echo "<span class='badge badge-danger'>Withered</span>";
                                                }elseif($row['p_condition'] =='3'){
                              						echo "<span class='badge badge-warning'>Dead</span>";
                                                }
                                                ?>
                                                </td>
                                                <td><a href="<?php echo $row['floc']; ?>"><i
                                                            class="fas fa-paperclip"></i> <i>Attachment</i></a></td>
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
                                                <td>
                                                    <a class="btn btn-success"
                                                        href="edit_task_modal.php<?php echo '?student_task_id='.$id.'&id='.$get_id.'&post_id='.$post_id ?>"><i
                                                            class="fas fa-edit"></i> Edit</a>
                                                </td>
                                            </tr>
                                            <?php 
                                                    }
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
    <script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')

            $('.toastsDefaultWarning').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-warning',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultDanger').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
        });
    });
    </script>
</body>

</html>