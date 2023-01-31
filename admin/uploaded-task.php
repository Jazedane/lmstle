<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Uploaded Task</title>

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
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date Upload</th>
                                            <th>Category</th>
                                            <th>Task Name</th>
                                            <th>Quarter</th>
                                            <th>Due Date</th>
                                            <th>Class</th>

                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php
										$query = mysqli_query($conn,"SELECT * FROM tbl_task 
                                        LEFT JOIN tbl_teacher ON tbl_teacher.teacher_id = tbl_task.teacher_id
                                        LEFT JOIN tbl_grade_category ON tbl_grade_category.grade_category_id = tbl_task.grade_category_id
										LEFT JOIN tbl_teacher_class ON tbl_teacher_class.teacher_class_id = tbl_task.class_id and tbl_task.isDeleted=false
										INNER JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id 
                                        WHERE tbl_teacher_class.teacher_class_id = $get_id ORDER BY date_upload DESC")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
									?>
                                        <tr>
                                            <td data-order=<fmt:formatDate pattern="F d, Y h:i A"><?php $date_upload = date_create($row['date_upload']);
                                                    echo date_format(
                                                    $date_upload,
                                                    'F d, Y h:i A'
                                                    ); ?>
                                            </td>
                                            <td><?php echo $row['category_name']; ?></td>
                                            <td><?php  echo $row['task_name']; ?></td>
                                            <td width="60">
                                                <center><?php echo $row[
                                                'quarter'
                                            ]; ?></center>
                                            </td>
                                            <td><?php $end_date = date_create($row['end_date']);
                                                    echo date_format(
                                                    $end_date,
                                                    'F d, Y h:i A'
                                                    ); ?>
                                            </td>
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
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", {
                    extend: 'print',
                    messageTop: '<p align="right">Date: <b><?php date_default_timezone_set('Singapore'); echo $date= date('F d, Y');?></b></p>',
                    messageBottom: '<br><div class="float-right"><u><b><?php
                                            ($query = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbl_teacher WHERE isDeleted=false AND teacher_id=$session_id ORDER BY lastname"
                                            )) or die(mysqli_error());
                                            while (
                                                $row = mysqli_fetch_array(
                                                    $query
                                                )
                                            ) {
                                                $id = $row['teacher_id']; ?><?php $middlename = $row['middlename']; echo $row['firstname'] ." ". $middlename = mb_substr($middlename, 0, 1) .". ". $row['lastname'];?><?php } ?></b></u><p class="text-center">Teacher</p></div></br>',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    },
                    title: '<center><h5><b>Uploaded Task List</b></h5></center>',
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
                },]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
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