<div class="modal fade" id="addtask-xl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 id="myModalLabel" class="modal-title">Create Task</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" id="add_task" method="post" enctype="multipart/form-data" name="upload">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="id" value="<?php echo $session_id; ?>" />
                            <input type="hidden" name="teacher_class_id" value="<?php echo $get_id; ?>">
                            <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                            <div class="form-group">
                                <label>Task Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter activity name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Description (Optional)</label>
                                <textarea class="form-control" name="desc" rows="3"
                                    placeholder="Enter description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Points</label>
                                <input type="number" name="total_points" class="form-control" placeholder="Enter points"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Grade Category</label>
                                <select class="form-control" name="grade_category_id" required>
                                    <option value="">Select Category</option>
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
                                    <option value="">Select Quarter</option>
                                    <option value="1" selected="<?php echo $quarter == 1 ? 'true' : 'false'; ?>">
                                        1st Quarter
                                    </option>
                                    <option value="2" selected="<?php echo $quarter == 2 ? 'true' : 'false'; ?>">
                                        2nd Quarter
                                    </option>
                                    <option value="3" selected="<?php echo $quarter == 3 ? 'true' : 'false'; ?>">
                                        3rd Quarter
                                    </option>
                                    <option value="4" selected="<?php echo $quarter == 4 ? 'true' : 'false'; ?>">
                                        4th Quarter
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="due_date">Due Date:</label>
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="text" name="end_date" class="datetimepicker-input form-control"
                                        data-target="#reservationdatetime" value="<?php echo isset(
                                                    $end_date
                                                )
                                                    ? datetime(
                                                        'Y-m-d h:i a',
                                                        strtotime($end_date)
                                                    )
                                                    : ''; ?>" required>
                                    <div class="input-group-append" data-target="#reservationdatetime"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="modal-footer justify-content-between">
                                        <button class="btn btn-primary" data-dismiss="modal"
                                            class="btn btn-outline-light"><i class="fas fa-times"></i>
                                            Cancel</button>
                                        <button name="Upload" type="submit" value="Upload"
                                            class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
                                'Last Month': [moment().subtract(1, 'month').startOf('month'),
                                    moment().subtract(1,
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
            </div>
        </div>
    </div>
</div>