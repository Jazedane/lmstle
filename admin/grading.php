<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Activity Grade</title>

    <?php 
        include 'header.php';
        include 'session.php';
        include 'script.php';
        $get_id = $_GET['id']; 

        $task_column_ids1 = array();
        $task_column_ids2 = array();
        $task_column_ids3 = array();
        $task_column_ids4 = array();
    ?>
</head>

<body>
    <?php include 'homepage2.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student Grade</h1>
                    </div>
                    <div class="col-sm-6">
                        <?php
                        ($class_query = mysqli_query(
                            $conn,
                            "select * from tbl_teacher_class
										LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id
										where teacher_class_id = '$get_id'"
                        )) or die(mysqli_error());
                        $class_row = mysqli_fetch_array($class_query);
                        $class_id = $class_row['class_id'];
                        $school_year = $class_row['school_year'];
                        ?>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"><?php echo $class_row[
                                'class_name'
                            ]; ?></a> <span class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $class_row[
                                        'school_year'
                                    ]; ?></a> <span class="divider"></span></li>
                            <li class="breadcrumb-item active"><a href="#"><b>Student Grade</b></a></li>
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
                                <h3 class="card-title">1st Quarter</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <?php echo $class_row['class_name']; ?> Students
                                            </th>
                                            <th>
                                                Overall Grade
                                            </th>

                                            <?php
                                                ($header_query = mysqli_query(
                                                    $conn,
                                                    "SELECT * FROM tbl_task 
                                                    WHERE class_id = '$get_id' AND teacher_id = '$session_id' AND isDeleted=false
                                                    ORDER BY fname and total_points DESC "
                                                )) or die(mysqli_error());
                                                while (
                                                    $header_row = mysqli_fetch_array(
                                                        $header_query
                                                    )
                                                ) {
                                                    $id = $header_row['task_id'];
                                                    $floc = $header_row['floc'];
                                                    array_push($task_column_ids1, $id);
                                            ?>
                                            <th>
                                                <?php echo $header_row['fname']; ?> <br> out of <?php echo $header_row['total_points']; ?> points
                                            </th>
                                            <?php
                                                }
                                            ?>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                            ($query = mysqli_query(
                                                $conn,
                                                "SELECT
                                                *
                                                FROM
                                                    tbl_teacher_class_student
                                                LEFT JOIN tbl_student ON tbl_student.student_id = tbl_teacher_class_student.student_id AND tbl_student.isDeleted = FALSE
                                                INNER JOIN tbl_class ON tbl_class.class_id = tbl_student.class_id
                                                WHERE
                                                    teacher_class_id = '$get_id'
                                                ORDER BY
                                                    lastname"
                                            )) or die(mysqli_error());

                                            while (
                                                $row = mysqli_fetch_array($query)
                                            ) {
                                                $student_id = $row['student_id']; 
                                        ?>

                                        <tr>
                                            <td> <img id="avatar" src="/lmstle/admin/<?php echo $row['location']; ?>"
                                                    class="img-circle elevation" alt="User Image" height="30" width="30"> 
                                                   <?php echo $row['firstname'] . ' ' . $row['lastname']; ?>
                                            </td>
                                            <td> 
                                            </td>

                                            <?php
                                                for ($i = 0; $i < count($task_column_ids1); $i++) {
                                                ($grade_query = mysqli_query(
                                                    $conn,
                                                    "SELECT
                                                    *
                                                    FROM
                                                        tbl_student_task
                                                    LEFT JOIN tbl_student ON tbl_student.student_id = tbl_student_task.student_id
                                                    INNER JOIN tbl_task ON tbl_student_task.task_id = tbl_task.task_id
                                                    WHERE
                                                        tbl_task.class_id = '$get_id' AND tbl_student_task.task_id = '$task_column_ids1[$i]' AND tbl_student.student_id = '$student_id'
                                                    "
                                                )) or die(mysqli_error());

                                                    $grade_row_count = mysqli_num_rows($grade_query);

                                                    if ($grade_row_count === 0) {
                                                        ?>
                                            <td>0</td>
                                            <?php
                                                    }
    
                                                    while (
                                                        $grade_row = mysqli_fetch_array($grade_query)
                                                    ) {
                                                        $grade = $grade_row['grade']; 
                                            ?>
                                            <td>
                                                <?php echo $grade; ?>
                                            </td>
                                            <?php 
                                                    }
                                                }
                                            ?>
                                        </tr>

                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                                <h3 class="card-title">2nd Quarter</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <?php echo $class_row['class_name']; ?> Students
                                            </th>
                                            <th>
                                                Overall Grade
                                            </th>

                                            <?php
                                                ($header_query = mysqli_query(
                                                    $conn,
                                                    "SELECT * FROM tbl_task 
                                                    WHERE class_id = '$get_id' AND teacher_id = '$session_id' AND isDeleted=false
                                                    ORDER BY fname and total_points DESC "
                                                )) or die(mysqli_error());
                                                while (
                                                    $header_row = mysqli_fetch_array(
                                                        $header_query
                                                    )
                                                ) {
                                                    $id = $header_row['task_id'];
                                                    $floc = $header_row['floc'];
                                                    array_push($task_column_ids2, $id);
                                            ?>
                                            <th>
                                                <?php echo $header_row['fname']; ?> <br> out of <?php echo $header_row['total_points']; ?> points
                                            </th>
                                            <?php
                                                }
                                            ?>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                            ($query = mysqli_query(
                                                $conn,
                                                "SELECT
                                                *
                                                FROM
                                                    tbl_teacher_class_student
                                                LEFT JOIN tbl_student ON tbl_student.student_id = tbl_teacher_class_student.student_id AND tbl_student.isDeleted = FALSE
                                                INNER JOIN tbl_class ON tbl_class.class_id = tbl_student.class_id
                                                WHERE
                                                    teacher_class_id = '$get_id'
                                                ORDER BY
                                                    lastname"
                                            )) or die(mysqli_error());

                                            while (
                                                $row = mysqli_fetch_array($query)
                                            ) {
                                                $student_id = $row['student_id']; 
                                        ?>

                                        <tr>
                                            <td> <img id="avatar" src="/lmstle/admin/<?php echo $row['location']; ?>"
                                                    class="img-circle elevation" alt="User Image" height="30" width="30"> 
                                                   <?php echo $row['firstname'] . ' ' . $row['lastname']; ?>
                                            </td>
                                            <td> 
                                            </td>

                                            <?php
                                                for ($i = 0; $i < count($task_column_ids2); $i++) {
                                                ($grade_query = mysqli_query(
                                                    $conn,
                                                    "SELECT
                                                    *
                                                    FROM
                                                        tbl_student_task
                                                    LEFT JOIN tbl_student ON tbl_student.student_id = tbl_student_task.student_id
                                                    INNER JOIN tbl_task ON tbl_student_task.task_id = tbl_task.task_id
                                                    WHERE
                                                        tbl_task.class_id = '$get_id' AND tbl_student_task.task_id = '$task_column_ids2[$i]' AND tbl_student.student_id = '$student_id'
                                                    "
                                                )) or die(mysqli_error());

                                                    $grade_row_count = mysqli_num_rows($grade_query);

                                                    if ($grade_row_count === 0) {
                                                        ?>
                                            <td>0</td>
                                            <?php
                                                    }
    
                                                    while (
                                                        $grade_row = mysqli_fetch_array($grade_query)
                                                    ) {
                                                        $grade = $grade_row['grade']; 
                                            ?>
                                            <td>
                                                <?php echo $grade; ?>
                                            </td>
                                            <?php 
                                                    }
                                                }
                                            ?>
                                        </tr>

                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                                <h3 class="card-title">3rd Quarter</h3>
                            </div>
                            <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <?php echo $class_row['class_name']; ?> Students
                                            </th>
                                            <th>
                                                Overall Grade
                                            </th>

                                            <?php
                                                ($header_query = mysqli_query(
                                                    $conn,
                                                    "SELECT * FROM tbl_task 
                                                    WHERE class_id = '$get_id' AND teacher_id = '$session_id' AND isDeleted=false
                                                    ORDER BY fname and total_points DESC "
                                                )) or die(mysqli_error());
                                                while (
                                                    $header_row = mysqli_fetch_array(
                                                        $header_query
                                                    )
                                                ) {
                                                    $id = $header_row['task_id'];
                                                    $floc = $header_row['floc'];
                                                    array_push($task_column_ids3, $id);
                                            ?>
                                            <th>
                                                <?php echo $header_row['fname']; ?> <br> out of <?php echo $header_row['total_points']; ?> points
                                            </th>
                                            <?php
                                                }
                                            ?>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                            ($query = mysqli_query(
                                                $conn,
                                                "SELECT
                                                *
                                                FROM
                                                    tbl_teacher_class_student
                                                LEFT JOIN tbl_student ON tbl_student.student_id = tbl_teacher_class_student.student_id AND tbl_student.isDeleted = FALSE
                                                INNER JOIN tbl_class ON tbl_class.class_id = tbl_student.class_id
                                                WHERE
                                                    teacher_class_id = '$get_id'
                                                ORDER BY
                                                    lastname"
                                            )) or die(mysqli_error());

                                            while (
                                                $row = mysqli_fetch_array($query)
                                            ) {
                                                $student_id = $row['student_id']; 
                                        ?>

                                        <tr>
                                            <td> <img id="avatar" src="/lmstle/admin/<?php echo $row['location']; ?>"
                                                    class="img-circle elevation" alt="User Image" height="30" width="30"> 
                                                   <?php echo $row['firstname'] . ' ' . $row['lastname']; ?>
                                            </td>
                                            <td> 
                                            </td>

                                            <?php
                                                for ($i = 0; $i < count($task_column_ids3); $i++) {
                                                ($grade_query = mysqli_query(
                                                    $conn,
                                                    "SELECT
                                                    *
                                                    FROM
                                                        tbl_student_task
                                                    LEFT JOIN tbl_student ON tbl_student.student_id = tbl_student_task.student_id
                                                    INNER JOIN tbl_task ON tbl_student_task.task_id = tbl_task.task_id
                                                    WHERE
                                                        tbl_task.class_id = '$get_id' AND tbl_student_task.task_id = '$task_column_ids3[$i]' AND tbl_student.student_id = '$student_id'
                                                    "
                                                )) or die(mysqli_error());

                                                    $grade_row_count = mysqli_num_rows($grade_query);

                                                    if ($grade_row_count === 0) {
                                                        ?>
                                            <td>0</td>
                                            <?php
                                                    }
    
                                                    while (
                                                        $grade_row = mysqli_fetch_array($grade_query)
                                                    ) {
                                                        $grade = $grade_row['grade']; 
                                            ?>
                                            <td>
                                                <?php echo $grade; ?>
                                            </td>
                                            <?php 
                                                    }
                                                }
                                            ?>
                                        </tr>

                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                                <h3 class="card-title">4th Quarter</h3>
                            </div>
                            <div class="card-body">
                                <table id="example4" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <?php echo $class_row['class_name']; ?> Students
                                            </th>
                                            <th>
                                                Overall Grade
                                            </th>

                                            <?php
                                                ($header_query = mysqli_query(
                                                    $conn,
                                                    "SELECT * FROM tbl_task 
                                                    WHERE class_id = '$get_id' AND teacher_id = '$session_id' AND isDeleted=false
                                                    ORDER BY fname and total_points DESC "
                                                )) or die(mysqli_error());
                                                while (
                                                    $header_row = mysqli_fetch_array(
                                                        $header_query
                                                    )
                                                ) {
                                                    $id = $header_row['task_id'];
                                                    $floc = $header_row['floc'];
                                                    array_push($task_column_ids4, $id);
                                            ?>
                                            <th>
                                                <?php echo $header_row['fname']; ?> <br> out of <?php echo $header_row['total_points']; ?> points
                                            </th>
                                            <?php
                                                }
                                            ?>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                            ($query = mysqli_query(
                                                $conn,
                                                "SELECT
                                                *
                                                FROM
                                                    tbl_teacher_class_student
                                                LEFT JOIN tbl_student ON tbl_student.student_id = tbl_teacher_class_student.student_id AND tbl_student.isDeleted = FALSE
                                                INNER JOIN tbl_class ON tbl_class.class_id = tbl_student.class_id
                                                WHERE
                                                    teacher_class_id = '$get_id'
                                                ORDER BY
                                                    lastname"
                                            )) or die(mysqli_error());

                                            while (
                                                $row = mysqli_fetch_array($query)
                                            ) {
                                                $student_id = $row['student_id']; 
                                        ?>

                                        <tr>
                                            <td> <img id="avatar" src="/lmstle/admin/<?php echo $row['location']; ?>"
                                                    class="img-circle elevation" alt="User Image" height="30" width="30"> 
                                                   <?php echo $row['firstname'] . ' ' . $row['lastname']; ?>
                                            </td>
                                            <td> 
                                            </td>

                                            <?php
                                                for ($i = 0; $i < count($task_column_ids4); $i++) {
                                                ($grade_query = mysqli_query(
                                                    $conn,
                                                    "SELECT
                                                    *
                                                    FROM
                                                        tbl_student_task
                                                    LEFT JOIN tbl_student ON tbl_student.student_id = tbl_student_task.student_id
                                                    INNER JOIN tbl_task ON tbl_student_task.task_id = tbl_task.task_id
                                                    WHERE
                                                        tbl_task.class_id = '$get_id' AND tbl_student_task.task_id = '$task_column_ids4[$i]' AND tbl_student.student_id = '$student_id'
                                                    "
                                                )) or die(mysqli_error());

                                                    $grade_row_count = mysqli_num_rows($grade_query);

                                                    if ($grade_row_count === 0) {
                                                        ?>
                                            <td>0</td>
                                            <?php
                                                    }
    
                                                    while (
                                                        $grade_row = mysqli_fetch_array($grade_query)
                                                    ) {
                                                        $grade = $grade_row['grade']; 
                                            ?>
                                            <td>
                                                <?php echo $grade; ?>
                                            </td>
                                            <?php 
                                                    }
                                                }
                                            ?>
                                        </tr>

                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                                <h3 class="card-title">Overall Grade</h3>
                            </div>
                            <div class="card-body">
                                <table id="example5" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo $class_row[
                                                'class_name'
                                            ]; ?> Students</th>
                                            <th>1st Quarter</th>
                                            <th>2nd Quarter</th>
                                            <th>3rd Quarter</th>
                                            <th>4th Quarter</th>
                                            <th>General Average</th>

                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                            ($query = mysqli_query(
                                                $conn,
                                                "SELECT
                                                *
                                                FROM
                                                    tbl_teacher_class_student
                                                LEFT JOIN tbl_student ON tbl_student.student_id = tbl_teacher_class_student.student_id AND tbl_student.isDeleted = FALSE
                                                INNER JOIN tbl_class ON tbl_class.class_id = tbl_student.class_id
                                                WHERE
                                                    teacher_class_id = '$get_id'
                                                ORDER BY
                                                    lastname"
                                            )) or die(mysqli_error());

                                            while (
                                                $row = mysqli_fetch_array($query)
                                            ) {
                                                $student_id = $row['student_id']; 
                                        ?>
                                        <tr>
                                            <td><img id="avatar" src="/lmstle/admin/<?php echo $row['location']; ?>"
                                                    class="img-circle elevation" alt="User Image" height="30" width="30">
                                                   <?php echo $row['firstname'] . ' ' . $row['lastname']; ?>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
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
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    </script>
    <script>
    $(function() {
        $("#example2").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
    </script>
    <script>
    $(function() {
        $("#example3").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    });
    </script>
    <script>
    $(function() {
        $("#example4").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
    });
    </script>
    <script>
    $(function() {
        $("#example5").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example5_wrapper .col-md-6:eq(0)');
    });
    </script>
</body>

</html>