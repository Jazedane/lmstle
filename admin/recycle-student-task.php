<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Recycle Bin</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>

</head>

<body>
    <?php include 'index.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Recycle Bin</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Recycle Bin</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Recycle Bin</h3>
                    </div>
                    <div class="card-body">
                        <form action="restore-data-student-task.php" method="post">
                            <table id="example2" class="table table-bordered table-striped">
                                <ul data-toggle="modal" href="#recycle-delete-student-task" id="delete" class="btn btn-danger"
                                    name=""><i class="fas fa-trash"></i> Delete Data</ul>
                                <?php include 'recycle-delete-modal.php'; ?>
                                <ul data-toggle="modal" href="#restore_data_student_task" id="restore" class="btn btn-primary"
                                    name=""><i class="fas fa-recycle"></i> Restore data
                                </ul>
                                <?php include 'restore_data_modal.php'; ?>
                                <div class="float-right">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-users"></i> Recycle List
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <a href="recycle-student.php" class="dropdown-item" type="button">
                                                    Student</a>
                                                <a href="recycle-teacher.php" class="dropdown-item" type="button">
                                                    Teacher</a>
                                                <a href="recycle-class.php" class="dropdown-item" type="button">
                                                    Class</a>
                                                <a href="recycle-student-task.php" class="dropdown-item active" type="button">
                                                    Student Task</a>
                                                <a href="recycle-teacher-task.php" class="dropdown-item" type="button">
                                                    Teacher Task</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="selectAll" id="checkAll" />
                                            <script>
                                            $("#checkAll").click(function() {
                                                $('input:checkbox').not(this).prop('checked', this.checked);
                                            });
                                            </script>
                                        </th>
                                        <th>Date Submitted</th>
                                        <th>Activity Name</th>
                                        <th>Description</th>
                                        <th>Submitted by:</th>
                                        <th>Status</th>
                                        <th>Condition</th>
                                        <th>Attachment</th>
                                        <th>Points</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    <?php
										    $query = mysqli_query($conn,"select * FROM tbl_student_task
										    LEFT JOIN tbl_student on tbl_student.student_id  = tbl_student_task.student_id
										    where tbl_student_task.isDeleted=true order by task_fdatein DESC")or die(mysqli_error());
										    while($row = mysqli_fetch_array($query)){
										    $id  = $row['student_task_id'];
                                            $student_id = $row['student_id'];
                                            $task_name = $row['fname'];
									        ?>
                                    <tr>
                                        <td><input id="checkAll" type="checkbox" value="<?php echo $id; ?>"
                                                class="uniform_on" name="selector[]"></td>
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
                                        <td><a href="<?php echo $row['floc']; ?>"><i class="fas fa-paperclip"></i>
                                                <i>Attachment</i></a></td>
                                        <td><span class="badge badge-success"><?php  echo $row['grade']; ?></span></td>
                                    </tr>
                                    <?php
             	                        }
             	                        ?>
                                </tbody>
                            </table>
                        </form>
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
</body>

</html>