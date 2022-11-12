<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Activity</title>

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
                        <h1>Create Activity</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <?php
                            ($school_year_query = mysqli_query(
                                $conn,
                                'select * from tbl_school_year order by school_year DESC'
                            )) or die(mysqli_error());
                            $school_year_query_row = mysqli_fetch_array(
                                $school_year_query
                            );
                            $school_year = $school_year_query_row['school_year'];
                            ?>
                            <li class="breadcrumb-item"><a href="#"><b>Home</b></a><span class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $school_year_query_row['school_year']; ?></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Create Activity</h3>
                        </div>
                        <form class="" id="add_activity" method="post" enctype="multipart/form-data" name="Upload">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="hidden" name="id" value="<?php echo $session_id; ?>" />
                                        <div class="form-group">
                                            <label>Activity Name</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Enter task name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Description (Optional)</label>
                                            <textarea id="assigntextare" class="form-control" name="desc" rows="3"
                                                placeholder="Enter description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Points</label>
                                            <input type="number" name="total_points" maxlength="3" min="1" max="100"
                                                class="form-control" placeholder="Enter points" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Due Date:</label>
                                            <div class="input-group date" id="reservationdatetime"
                                                data-target-input="nearest">
                                                <input type="text" name="end_date"
                                                    class="form-control datetimepicker-input"
                                                    data-target="#reservationdatetime" value="<?php echo isset($end_date)? datetime('Y-m-d h:i:sa',strtotime($end_date))
                                                    : ''; ?>" required>
                                                <div class="input-group-append" data-target="#reservationdatetime"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="alert alert-primary">Check the Class you want to put the
                                            Activity.</div>
                                        <table class="table table-striped projects">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" name="selectAll" id="checkAll" />
                                                        <script>
                                                        $("#checkAll").click(function() {
                                                            $('input:checkbox').not(this).prop(
                                                                'checked',
                                                                this.checked);
                                                        });
                                                        </script>
                                                    </th>
                                                    <th>Class Name</th>
                                                    <th>Class Code</th>
                                                </tr>

                                            </thead>
                                            <tbody>

                                                <?php
                                                    ($query = mysqli_query(
                                                    $conn,
                                                    "select * from tbl_teacher_class
										            LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id 
										            LEFT JOIN tbl_subject ON tbl_subject.subject_id = tbl_teacher_class.subject_id
										            where teacher_id = '$session_id' and school_year = '$school_year' and tbl_class.isDeleted='false'"
                                                    )) or die(mysqli_error());
                                                    $count = mysqli_num_rows($query);
                                                    while (
                                                        $row = mysqli_fetch_array(
                                                        $query
                                                    )
                                                    ) {
                                                    $id = $row['teacher_class_id']; ?>

                                                <tr>
                                                    <td width="30">
                                                        <input id="checkAll" class="" name="selector[]" type="checkbox"
                                                            value="<?php echo $id; ?>">
                                                    </td>
                                                    <td><?php echo $row[
                                                    'class_name'
                                                ]; ?></td>
                                                    <td><?php echo $row[
                                                    'class_id'
                                                ]; ?></td>
                                                </tr>

                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-footer">
                                            <center><button name="Upload" type="submit" value="Upload"
                                                    class="btn btn-success">Create</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
        <script>
    jQuery(document).ready(function($) {
        $("#add_activity").submit(function(e) {
            e.preventDefault();
            alert("Uploading File Please Wait......", {
                sticky: true
            });
            e.preventDefault();
            var _this = $(e.target);
            var formData = new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: "add_task_save.php",
                data: formData,
                success: function(html) {
                    alert("Activity Successfully Added", {
                        header: 'Activity Added'
                    });
                    window.location = 'add_task.php';
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });
    </script>
    <script>
    function calculateTimeLeft(targetElement, _dueDate) {
        var now = new Date();
        var dueDate = new Date(_dueDate);
        var diff = dueDate.getTime() - now.getTime();

        if (isNaN(diff)) {
            $(`#${targetElement}`).html('Invalid Date');
            return;
        }

        if (diff <= 0) {
            $(`#${targetElement}`).html('Deadline has Passed');
            return;
        }

        var days = Math.floor(diff / (1000 * 60 * 60 * 24));
        var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((diff % (1000 * 60)) / 1000);

        $(`#${targetElement}`).html(days + " days " + hours + " hours " + minutes + " minutes " + seconds +
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
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
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