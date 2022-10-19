<?php include 'header.php'; ?>
<?php include 'session.php'; ?>

<body id="class_div">
    <?php include 'sidebar.php'; ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span10" id="content">
                <div class="row-fluid">

                    <ul class="breadcrumb">
                        <?php
                        ($school_year_query = mysqli_query(
                            $conn,
                            'select * from school_year order by school_year DESC'
                        )) or die(mysqli_error());
                        $school_year_query_row = mysqli_fetch_array(
                            $school_year_query
                        );
                        $school_year = $school_year_query_row['school_year'];
                        ?>
                        <li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
                        <li><a href="#">School Year: <?php echo $school_year_query_row[
                            'school_year'
                        ]; ?></a></li>
                    </ul>

                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="count_class" class="muted pull-right">
                            </div>
                        </div>
                        <form class="" id="add_downloadable" method="post" enctype="multipart/form-data" name="upload">
                            <div class="block-content collapse in">
                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail">Add Task</label>
                                        <div class="mb-3">
                                            <input type="hidden" name="id" value="<?php echo $session_id; ?>" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input type="text" name="name" Placeholder="Task Name" class="input" style="width:260px" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <textarea id="assigntextare" placeholder="Description" name="desc" style="width:260px;height:100px"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="task_status" id="status" class="custom-select custom-select-sm" style="width:260px">
                                                <option value="0" <?php echo isset($task_status) &&
                                                    $task_status == 0
                                                        ? 'selected'
                                                        : ''; ?>>
                                                    Pending
                                                </option>
                                                <option value="3" <?php echo isset($task_status) &&
                                                    $task_status == 3
                                                        ? 'selected'
                                                        : ''; ?>>
                                                    On-Hold
                                                </option>
                                                <option value="5" <?php echo isset($task_status) &&
                                                    $task_status == 5
                                                        ? 'selected'
                                                        : ''; ?>>
                                                    Done
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="control-label">End Date</label>
                                            <input type="date" class="form-control form-control-sm" autocomplete="off"
                                                name="end_date" value="<?php echo isset(
                                                    $end_date
                                                )
                                                    ? datetime(
                                                        'Y-m-d h:i:sa',
                                                        strtotime($end_date)
                                                    )
                                                    : ''; ?>" style="width:260px" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="span8">
                                    <div class="alert alert-info">Check The Class you want to put this file.</div>
                                    <div class="">
                                        Check All <input type="checkbox" name="selectAll" id="checkAll" />
                                        <script>
                                        $("#checkAll").click(function() {
                                            $('input:checkbox').not(this).prop('checked', this.checked);
                                        });
                                        </script>
                                    </div>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Class Name</th>
                                                <th>Class Code</th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                            <?php
                                            ($query = mysqli_query(
                                                $conn,
                                                "select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id and class.isDeleted=false
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_id = '$session_id' and school_year = '$school_year'"
                                            )) or die(mysqli_error());
                                            $count = mysqli_num_rows($query);
                                            while (
                                                $row = mysqli_fetch_array(
                                                    $query
                                                )
                                            ) {
                                                $id =
                                                    $row['teacher_class_id']; ?>
                                            <tr id="del<?php echo $id; ?>">
                                                <td width="30">
                                                    <input id="" class="" name="selector[]" type="checkbox"
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
                                <div class="span10">
                                    <center>
                                        <div class="control-group">
                                            <div class="controls">
                                                <button name="Upload" type="submit" value="Upload"
                                                    class="btn btn-success">
                                                    <i class="fa-solid fa-upload"></i>Upload
                                                </button>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>
    <?php include 'script.php'; ?>
    <script>
    jQuery(document).ready(function($) {
        $("#add_downloadable").submit(function(e) {
            e.preventDefault();
            $.jGrowl("Uploading File Please Wait......", {
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
                    $.jGrowl("Task Successfully Added", {
                        header: 'Task Added'
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
</body>

</html>