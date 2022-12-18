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
                                        <select name="grade" class="form-control" placeholder="Gender" required>
                                            <option selected disabled hidden>SELECT GRADE</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Section</label>
                                        <input name="section" type="text" class="form-control" placeholder="Enter Class"
                                            style="text-transform: uppercase" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject:</label>
                                        <select name="subject_id" class="form-control" required>
                                            <option selected disabled hidden>SELECT SUBJECT</option>
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
                                            <option selected disabled hidden>SELECT SCHOOL YEAR</option>
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
                        <form method="post" action="add-school-year.php">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-edit"></i> Add School Year</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>School Year</label>
                                        <input name="school_year" type="varchar" maxlength="9" onBlur='addDashes1(this)'
                                            autocomplete="off" class="form-control" placeholder="ENTER SCHOOL YEAR">
                                    </div>
                                    <input type="hidden" name="teacher_id" value="<?php echo $_SESSION['id'] ?>" />
                                </div>
                                <div class="card-footer">
                                    <center><button name="save_school_year" type="submit" class="btn btn-success"><i
                                                class="fas fa-plus">
                                            </i> Add</button>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                    <SCRIPT LANGUAGE="JavaScript">
                    function addDashes1(f) {
                        f.value = f.value.replace(/\D/g, '');

                        f.value = f.value.slice(0, 4) + "-" + f.value.slice(4, 8);
                    }
                    </SCRIPT>
                    <?php if (isset($_POST['save'])) {
                        $grade = $_POST['grade'];
                        $section = strtoupper($_POST['section']);
                        $class_name = 'GRADE ' . $grade . ' - ' . $section;

                        ($query = mysqli_query(
                            $conn,
                            "SELECT * FROM tbl_class WHERE class_name  =  '$class_name' "
                        )) or die(mysqli_error());
                        $count = mysqli_num_rows($query);

                        if ($count > 0) { ?>
                    <script>
                    toastr.warning("Class Already Exists!");
                    setTimeout(function() {
                        window.location = "new-class.php";
                    }, 1000);
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
                            }
                    ?>
                    <script>
                    toastr.success("Class Successfully Added!");
                    setTimeout(function() {
                        window.location = "new-class.php";
                    }, 1000);
                    </script>
                    <?php } } ?>
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Class List</h3>
                            </div>
                            <div class="card-body">
                                <form id="delete_class" method="post">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <ul data-toggle="modal" href="#class_delete" id="delete" class="btn btn-danger"
                                            name="delete_class"><i class="fas fa-trash"></i></ul>
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
                                                "SELECT * FROM tbl_teacher_class 
                                                INNER JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id and tbl_teacher_class.school_year_id 
                                                WHERE teacher_id = '$session_id' 
                                                AND tbl_class.isDeleted = false"
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
                                                <td width="40"><a href="edit-new-class.php<?php echo '?id=' .
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
    <script type="text/javascript">
    $(document).ready(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000
        });
        $('.delete_class').click(function() {
            var selectedIds = $('[name="selector[]"]:checked').map((_,
                element) => {
                return $(element).val()
            }).get()

            $.ajax({
                type: "POST",
                url: "delete_class.php",
                data: ({
                    selector: selectedIds,
                    delete_class: true
                }),
                success: function(html) {
                    toastr.error(
                        "Class Successfully Deleted"
                    );
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            });
            return false;
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