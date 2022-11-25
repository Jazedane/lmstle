<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Class</title>

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
                        <h1>Masterlist</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Class</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <form method="post">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-plus"></i> Add Class</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Grade</label>
                                        <input name="grade" type="text" class="form-control"
                                            placeholder="Enter Class" style="text-transform: uppercase" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Section</label>
                                        <input name="section" type="text" class="form-control"
                                            placeholder="Enter Class" style="text-transform: uppercase" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject:</label>
                                        <select name="subject_id" class="form-control" required>
                                            <option></option>
                                            <?php
                                            $query = mysqli_query(
                                                $conn,
                                                'select * from tbl_subject order by subject_code'
                                            );
                                            while (
                                                $row = mysqli_fetch_array(
                                                    $query
                                                )
                                            ) { ?>
                                            <option value="<?php echo $row[
                                                'subject_id'
                                            ]; ?>">
                                                <?php echo $row[
                                                    'subject_code'
                                                ]; ?>
                                            </option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>School Year:</label>
                                        <select name="school_year_id" class="form-control" required>
                                            <option></option>
                                            <?php
                                            $query = mysqli_query(
                                                $conn,
                                                'select * from tbl_school_year order by school_year DESC'
                                            );
                                            while (
                                                $row = mysqli_fetch_array(
                                                    $query
                                                )
                                            ) { ?>
                                            <option value="<?php echo $row[
                                                'school_year_id'
                                            ]; ?>">
                                                <?php echo $row[
                                                    'school_year'
                                                ]; ?>
                                            </option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="session_id" value="<?php echo $session_id; ?>"
                                        class="form-control" required>
                                    </input>
                                </div>
                                <div class="form-group">
                                    <center><button name="save" type="submit" class="btn btn-success"><i
                                                class="fas fa-plus">
                                            </i> Add</button></center>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php if (isset($_POST['save'])) {
                        $grade = $_POST['grade'];
                        $section = $_POST['section'];
                        $class_name = 'GRADE ' . $grade . ' - ' . $section;

                        ($query = mysqli_query(
                            $conn,
                            "SELECT * FROM tbl_class WHERE class_name  =  '$class_name' "
                        )) or die(mysqli_error());
                        $count = mysqli_num_rows($query);

                        if ($count > 0) { ?>
                    <script>
                        toastr.error("Class Already Exists!");
                    </script>
                    <?php } else {mysqli_query(
                                $conn,
                                "INSERT INTO tbl_class (class_name,year,section) VALUES('$class_name','$grade','$section')"
                            ) or die(mysqli_error());

                            $session_id = $_POST['session_id'];
                            $subject_id = $_POST['subject_id'];
                            $school_year_id = $_POST['school_year_id'];

                            ($query_class_id = mysqli_query(
                                $conn,
                                "SELECT * FROM tbl_class WHERE class_name = '$class_name'"
                            )) or die(mysqli_error());

                            $query_class_id_result = mysqli_fetch_array(
                                $query_class_id
                            );
                            $class_id = $query_class_id_result['class_id'];

                            ($query = mysqli_query(
                                $conn,
                                "select * from tbl_teacher_class where subject_id = '$subject_id' and class_id = '$class_id' and teacher_id = '$session_id' and school_year_id = '$school_year_id'"
                            )) or die(mysqli_error());

                            $count = mysqli_num_rows($query);

                            if ($count > 0) {
                                echo 'true';
                            } else {
                                mysqli_query(
                                    $conn,
                                    "insert into tbl_teacher_class (teacher_id,subject_id,class_id,thumbnails,school_year_id) values('$session_id','$subject_id','$class_id','/lmstlee4/admin/uploads/thumbnails.png','$school_year_id')"
                                ) or die(mysqli_error());

                                ($teacher_class = mysqli_query(
                                    $conn,
                                    'select * from tbl_teacher_class order by teacher_class_id DESC'
                                )) or die(mysqli_error());

                                $teacher_row = mysqli_fetch_array(
                                    $teacher_class
                                );
                                $teacher_id = $teacher_row['teacher_class_id'];

                                ($insert_query = mysqli_query(
                                    $conn,
                                    "select * from tbl_student where class_id = '$class_id'"
                                )) or die(mysqli_error());

                                while (
                                    $row = mysqli_fetch_array($insert_query)
                                ) {
                                    $id = $row['student_id'];
                                    mysqli_query(
                                        $conn,
                                        "insert into tbl_teacher_class_student (teacher_id,student_id,teacher_class_id) value('$session_id','$id','$teacher_id')"
                                    ) or die(mysqli_error());
                                    echo 'yes';
                                }
                            }}
                    } ?>
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Class List</h3>
                            </div>
                            <div class="card-body">
                                <form action="delete_class.php" method="post">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <ul data-toggle="modal" href="#class_delete" id="delete" class="btn btn-danger"
                                            name=""><i class="fas fa-trash"></i></ul>
                                        <?php include 'modal_delete.php'; ?>
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" name="selectAll" id="checkAll" />
                                                    <script>
                                                    $("#checkAll").click(function() {
                                                        $('input:checkbox').not(this).prop('checked', this
                                                            .checked);
                                                    });
                                                    </script>
                                                </th>
                                                <th>Year And Section</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            ($class_query = mysqli_query(
                                                $conn,
                                                'SELECT * FROM tbl_class WHERE isDeleted=false'
                                            )) or die(mysqli_error());
                                            while (
                                                $class_row = mysqli_fetch_array(
                                                    $class_query
                                                )
                                            ) {
                                                $id = $class_row['class_id']; ?>

                                            <tr>
                                                <td width="30">
                                                    <input id="checkAll" class="uniform_on" name="selector[]"
                                                        type="checkbox" value="<?php echo $id; ?>">
                                                </td>
                                                <td><?php
                                                $class_name =
                                                    $class_row['class_name'];
                                                $class_name = strtoupper(
                                                    $class_name
                                                );
                                                echo $class_name;
                                                ?></td>
                                                <td width="40"><a href="edit_class.php<?php echo '?id=' .
                                                    $id; ?>" class="btn btn-success"><i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
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
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <script>
    jQuery(document).ready(function($) {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000
        });
        $("#add_class").submit(function(e) {
            e.preventDefault();
            var _this = $(e.target);
            var formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "add_class_action.php",
                data: formData,
                success: function(html) {
                    if (html == "true") {
                        toastr.warning("Class Already Exist");
                    } else {
                        toastr.success("Class Successfully Added");
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }
                }
            });
        });
    });
    </script>
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