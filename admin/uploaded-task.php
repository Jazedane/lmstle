<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Task</title>

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
                    <div class="col-sm-6">
                        <h1>Tasks</h1>
                    </div>
                    <div class="col-sm-6">
                        <?php
                        ($class_query = mysqli_query(
                            $conn,
                            "SELECT * FROM tbl_teacher_class
							LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id
                            LEFT JOIN tbl_school_year ON tbl_school_year.school_year_id = tbl_teacher_class.school_year_id
							WHERE teacher_class_id = '$get_id'"
                        )) or die(mysqli_error());
                        $class_row = mysqli_fetch_array($class_query);
                        $class_id = $class_row['class_id'];
                        ?>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"><?php echo $class_row['class_name']; ?></a> <span
                                    class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $class_row['school_year']; ?></a> <span class="divider"></span></li>
                            <li class="breadcrumb-item active"><a href="#"><b>Uploaded Task</b></a></li>
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
                                <h3 class="card-title">Uploaded Task</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date Upload</th>
                                            <th>Category</th>
                                            <th>Task Name</th>
                                            <th>Description</th>
                                            <th>Due Date</th>
                                            <th>Upload By</th>
                                            <th>Class</th>

                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php
										$query = mysqli_query($conn,"SELECT * FROM tbl_task 
                                                                    LEFT JOIN tbl_teacher ON tbl_teacher.teacher_id = tbl_task.teacher_id
                                                                    LEFT JOIN tbl_grade_category ON tbl_grade_category.grade_category_id = tbl_task.grade_category_id
																	LEFT JOIN tbl_teacher_class ON tbl_teacher_class.teacher_class_id = tbl_task.class_id and tbl_task.isDeleted=false
																	INNER JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id WHERE tbl_teacher_class.teacher_class_id = $get_id")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
									?>
                                        <tr>
                                            <td><?php $fdatein = date_create($row['fdatein']);
                                                    echo date_format(
                                                    $fdatein,
                                                    'M/d/Y h:i a'
                                                    ); ?>
                                            </td>
                                            <td><?php echo $row['category_name']; ?></td>
                                            <td><?php  echo $row['fname']; ?></td>
                                            <td><?php echo $row['fdesc']; ?></td>
                                            <td><?php $end_date = date_create($row['end_date']);
                                                    echo date_format(
                                                    $end_date,
                                                    'M/d/Y h:i a'
                                                    ); ?>
                                            </td>
                                            <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                            <td><?php echo $row['class_name']; ?></td>


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