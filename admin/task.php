<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Activity</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>
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
                        <ol class="breadcrumb float-sm-right">
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

                            <li class="breadcrumb-item"><a href="#"><?php echo $class_row[
                                'class_name'
                            ]; ?></a> <span class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $class_row[
                                        'school_year'
                                    ]; ?></a> <span class="divider"></span></li>
                            <li class="breadcrumb-item active"><a href="#"><b>Tasks List</b></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Create Task</h3>
                            </div>
                            <div class="card-body">
                                <form class="" id="add_task" method="post" enctype="multipart/form-data" name="upload">
                                    <div class="control-group"></div>
                                    <input type="hidden" name="id" value="<?php echo $session_id; ?>" />
                                    <input type="hidden" name="teacher_class_id" value="<?php echo $get_id; ?>">
                                    <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Task Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter activity name" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Instruction (Optional)</label>
                                                <textarea id="summernote" class="summernote form-control" name="desc"
                                                    rows="4" placeholder="Enter description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Points</label>
                                                <input type="number"
                                                    oninput="this.value = this.value.slice(0, this.dataset.maxlength);"
                                                    data-maxlength="3" name="total_points" min="1" max="100"
                                                    class="form-control" placeholder="Enter points" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Grade Category</label>
                                                <select class="form-control" name="grade_category_id" required>
                                                    <option value="" selected disabled hidden>Select Category</option>
                                                    <?php
                                            ($category_query = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbl_grade_category
                                                    LEFT JOIN tbl_class ON tbl_class.class_id = tbl_grade_category.class_id
                                                    WHERE tbl_grade_category.class_id = '$class_id'"
                                            )) or die(mysqli_error());
                                            while (
                                                $category_row = mysqli_fetch_array(
                                                    $category_query
                                                )
                                            ) { ?>
                                                    <option value="
                                                <?php echo $category_row[
                                                    'grade_category_id'
                                                ]; ?>
                                            ">
                                                        <?php echo $category_row[
                                                    'category_name'
                                                ]; ?>
                                                    </option>
                                                    <?php }
                                            ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="quarter">Quarter</label>
                                                <select name="quarter" class="form-control" required>

                                                    <option value="1"
                                                        selected="<?php echo $quarter == 1 ? 'true' : 'false'; ?>">
                                                        1st Quarter
                                                    </option>
                                                    <option value="2"
                                                        selected="<?php echo $quarter == 2 ? 'true' : 'false'; ?>">
                                                        2nd Quarter
                                                    </option>
                                                    <option value="3"
                                                        selected="<?php echo $quarter == 3 ? 'true' : 'false'; ?>">
                                                        3rd Quarter
                                                    </option>
                                                    <option value="4"
                                                        selected="<?php echo $quarter == 4 ? 'true' : 'false'; ?>">
                                                        4th Quarter
                                                    </option>
                                                    <option value="0" selected disabled hidden>Select Quarter</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="due_date">Due Date:</label>
                                                <div class="input-group date" id="reservationdatetime"
                                                    data-target-input="nearest">
                                                    <input type="text" name="end_date"
                                                        class="datetimepicker-input form-control"
                                                        data-target="#reservationdatetime" value="<?php echo isset(
                                                    $end_date
                                                )
                                                    ? datetime(
                                                        'Y-m-d h:i:sa',
                                                        strtotime($end_date)
                                                    )
                                                    : ''; ?>" required>
                                                    <div class="input-group-append" data-target="#reservationdatetime"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex w-100 justify-content-center align-items-center">
                                            <center><button name="Upload" type="submit" value="Upload"
                                                    class="btn btn-flat bg-gradient-success">Submit</button>
                                            </center>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Points For Written Task</h3>
                            </div>
                            <form class="" id="" method="post" enctype="multipart/form-data" name="upload">
                                <div class="control-group"></div>
                                <input type="hidden" name="id" value="<?php echo $session_id; ?>" />
                                <input type="hidden" name="teacher_class_id" value="<?php echo $get_id; ?>">
                                <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label><?php echo $class_row['class_name']; ?> STUDENTS</label>
                                        <select name="student_id" class="form-control" required>
                                            <option selected disabled hidden>Select Student</option>
                                            <?php
                                        $query = mysqli_query(
                                            $conn,
                                            "SELECT * FROM tbl_teacher_class_student
                                            LEFT JOIN tbl_student ON tbl_student.student_id = tbl_teacher_class_student.student_id AND tbl_student.isDeleted=false
                                            INNER JOIN tbl_class ON tbl_class.class_id = tbl_student.class_id 
                                            WHERE teacher_class_id = '$get_id'
                                            GROUP BY tbl_teacher_class_student.student_id order by firstname ASC"
                                        );
                                        while (
                                            $row = mysqli_fetch_array($query)
                                        ) { ?>
                                            <option value="<?php echo $row[
                                            'student_id'
                                        ]; ?>">
                                                <?php echo $row['firstname']; ?>
                                                <?php $middlename = $row['middlename']; echo $middlename = mb_substr($middlename, 0, 1); ?>.
                                                <?php echo $row[
                                                'lastname'
                                            ]; ?> </option>
                                            <?php }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Task Name</label>
                                        <select name="task_id" class="form-control" required id="task_selection">
                                            <option selected disabled hidden>Select Task</option>
                                            <?php
                                            $query = mysqli_query(
                                            $conn,
                                            "SELECT * FROM tbl_task 
                                            LEFT JOIN tbl_grade_category ON tbl_grade_category.grade_category_id = tbl_task.grade_category_id
                                            WHERE tbl_task.class_id = '$get_id' AND teacher_id = '$session_id' AND isDeleted=false
                                            ORDER BY date_upload ASC"
                                            );
                                            while (
                                                $row = mysqli_fetch_array($query)
                                            ) { ?>
                                            <option data-maxpoints="<?php echo $row['total_points'] ?>" value="<?php echo $row[
                                                'task_id'
                                            ]; ?>">
                                                <?php echo $row[
                                                'task_name'
                                            ]; ?> </option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Score <a id="task_grade_helper_text"></a></label>
                                        <input id="task_grade"
                                            oninput="this.value = this.value.slice(0, this.dataset.maxlength);"
                                            type="number" name="grade" class="form-control" placeholder="Enter Score"
                                            data-maxlength="3" min="1" max="100" required>

                                    </div>
                                    <div class="card-footer">
                                        <center><button name="add" type="submit" value="Upload"
                                                class="btn btn-success">Submit</button>
                                        </center>
                                    </div>
                                </div>
                            </form>
                            <?php if (isset($_POST['add'])) {
                            $student_id = $_POST['student_id'];
                            $task_id = $_POST['task_id'];
                            $grade = $_POST['grade'];

                            $query = mysqli_query(
                            $conn,
                            "SELECT * FROM tbl_student_task WHERE student_id  =  '$student_id' AND task_id  =  '$task_id' "
                            ) or die(mysqli_error());
                            $count = mysqli_num_rows($query);

                            if ($count > 0) { ?>
                            <script>
                            toastr.warning("Student Points Already Exists!");
                            setTimeout(function() {
                                window.location = "task.php<?php echo '?id='.$get_id ?>";
                            }, 1000);
                            </script>
                            <?php } else {mysqli_query($conn,"INSERT tbl_student_task SET student_id='$student_id', task_date_upload = NOW(), 
                            task_id ='$task_id', grade='$grade', task_status= '3'")
                            or die(mysqli_error($conn));
                            ?>
                            <script>
                            toastr.success("Success", "Points Successfully Added!");
                            setTimeout(function() {
                                window.location = "task.php<?php echo '?id='.$get_id ?>";
                            }, 1000);
                            </script>
                            <?php } } ?>
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
                                <h3 class="card-title">Tasks</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date Upload</th>
                                            <th>Task Name</th>
                                            <th>Instruction</th>
                                            <th>Quarter</th>
                                            <th>Category</th>
                                            <th>Points</th>
                                            <th>Due Date</th>
                                            <th>Time Left</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        ($query = mysqli_query(
                                            $conn,
                                            "SELECT * FROM tbl_task 
                                            LEFT JOIN tbl_grade_category ON tbl_grade_category.grade_category_id = tbl_task.grade_category_id
                                            WHERE tbl_task.class_id = '$get_id' AND teacher_id = '$session_id' AND isDeleted=false
                                            ORDER BY date_upload DESC"
                                        )) or die(mysqli_error($conn));
                                        while (
                                            $row = mysqli_fetch_array($query)
                                        ) {

                                            $id = $row['task_id'];
                                            $task_file = $row['task_file'];
                                            ?>
                                        <tr>
                                            <td width="220"><?php $date_upload = date_create($row['date_upload']);
                                                    echo date_format(
                                                    $date_upload,
                                                    'F d, Y h:i A'
                                                    ); ?>
                                            </td>
                                            <td><?php echo $row[
                                                'task_name'
                                            ]; ?></td>
                                            <td><?php echo $row[
                                                'task_desc'
                                            ]; ?></td>
                                            <td width="60"><?php echo $row[
                                                'quarter'
                                            ]; ?>
                                            </td>
                                            <td><?php echo $row[
                                                'category_name'
                                            ]; ?></td>
                                            <td width="40"><?php echo $row[
                                                'total_points'
                                            ]; ?>
                                            </td>
                                            <td width="220"><?php $end_date = date_create($row['end_date']);
                                                    echo date_format(
                                                    $end_date,
                                                    'F d, Y h:i A'
                                                    ); ?>
                                            </td>
                                            <td id="<?php echo $row[
                                                'task_id'
                                            ]; ?>-running-due">
                                                <script>
                                                $(document).ready(function() {
                                                    setInterval(() => {
                                                        calculateTimeLeft(
                                                            '<?php echo $row[
                                                                'task_id'
                                                            ]; ?>-running-due',
                                                            '<?php echo $row[
                                                                'end_date'
                                                            ]; ?>'
                                                        );
                                                    }, 1000)
                                                })
                                                </script>
                                            </td>
                                            <td width="100">
                                                <div class="justify content-between">
                                                    <form method="post" action="view_submit_task.php<?php echo '?id=' .
                                                    $get_id; ?>&<?php echo 'post_id=' .$id; ?>">

                                                        <button data-placement="bottom"
                                                            title="View Student Who Submit Activity"
                                                            id="<?php echo $id; ?>view"
                                                            class="btn btn-success float-left"><i
                                                                class="fas fa-folder"></i></button>

                                                        <a data-placement="bottom" title="Remove"
                                                            id="<?php echo $id; ?>remove"
                                                            class="btn btn-danger float-right"
                                                            href="#del<?php echo $id; ?>" data-toggle="modal"><i
                                                                class="fas fa-trash"></i></a>
                                                        <?php include 'delete_task_modal.php'; ?>
                                                    </form>
                                                </div>
                                                <?php if ($task_file == '') {
                                                } else {
                                                     ?>
                                                <?php
                                                } ?>
                                            </td>
                                            <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#<?php echo $id; ?>remove').tooltip('show');
                                                $('#<?php echo $id; ?>remove').tooltip('hide');
                                            });
                                            </script>
                                            <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#<?php echo $id; ?>view').tooltip('show');
                                                $('#<?php echo $id; ?>view').tooltip('hide');
                                            });
                                            </script>
                                            <?php
                                        }
                                        ?>
                                        </tr>
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
    // Summernote
    $('#summernote').summernote({
        toolbar: [
            ["style", ["style"]],
            ["font", ["bold", "underline", "clear"]],
            ["fontname", ["fontname"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["insert", ["link", "height"]],
            ["view", ["fullscreen", "help"]]
        ]
    })
    </script>
    <script>
    jQuery(document).ready(function($) {
        $("#task_selection").change(function() {
            const maxPoints = $(this).find(':selected').attr('data-maxpoints')
            if (maxPoints) {
                $("#task_grade_helper_text").html(`out of ${maxPoints}`)
                $("#task_grade").attr('max', `${maxPoints}`)
            } else {
                // clear limits
                $("#task_grade_helper_text").html(``)
                $("#task_grade").removeAttr('max')
            }
        })

        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000
        });
        $("#add_task").submit(function(e) {
            e.preventDefault();
            var _this = $(e.target);
            var formData = new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: "assign_save.php",
                data: formData,
                success: function(html) {
                    toastr.success("Task Successfully Added");
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });
    </script>
    <script>
    jQuery(document).ready(function($) {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000
        });
        $("#add_work").submit(function(e) {
            e.preventDefault();
            var _this = $(e.target);
            var formData = new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: "add-work.php",
                data: formData,
                success: function(html) {
                    toastr.success("Points Successfully Added");
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000
        });
        $('.delete-task').click(function() {

            var id = $(this).attr("id");
            $.ajax({
                type: "POST",
                url: "delete_task.php",
                data: ({
                    id: id
                }),
                cache: false,
                success: function(html) {
                    $("#del" + id).fadeOut('slow',
                        function() {
                            $(this).remove();
                        });
                    $('#' + id).modal('hide');
                    toastr.error("Task Successfully Deleted.");
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                },
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
            "buttons": ["copy", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            order: [
                [8,'desc']
            ],
        });
    });
    </script>
    <script>
    /**
     * Calculates the time left for a task
     * 
     * @param {string} elementId - The id of the element to update
     * @param {string} dueDate - The due date of the task
     */
    function calculateTimeLeft(targetElement, _dueDate) {
        var now = new Date();
        var dueDate = new Date(_dueDate);
        var diff = dueDate.getTime() - now.getTime();

        if (isNaN(diff)) {
            $(`#${targetElement}`).html('<span class="badge badge-warning">Invalid Date</span>');
            return;
        }

        if (diff <= 0) {
            $(`#${targetElement}`).html('<span class="badge badge-danger">Deadline has Passed</span>');
            return;
        }

        var days = Math.floor(diff / (1000 * 60 * 60 * 24));
        var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((diff % (1000 * 60)) / 1000);

        $(`#${targetElement}`).html(days + " days " + hours + " hours " + minutes + " minutes " +
            seconds +
            " seconds ");
    }
    </script>
    <script>
    $(function() {
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1,
                        'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment()
                        .subtract(1,
                            'month').endOf('month')
                    ]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end
                    .format(
                        'MMMM D, YYYY'))
            }
        )
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

    })
    </script>
</body>

</html>