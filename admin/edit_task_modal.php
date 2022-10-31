<?php
$get_id = $_GET['id'];
$post_id = $_GET['post_id'];
$student_task_id = $_GET['student_task_id'];

echo "SELECT * FROM tbl_student_task WHERE student_task_id='$student_task_id'";

$query = mysqli_query($conn,"SELECT * FROM tbl_student_task
							WHERE student_task_id='$student_task_id'")or die(mysqli_error());
$result = mysqli_fetch_assoc($query);

$task_status = $result['task_status'];
$p_condition = $result['p_condition'];
?>
<div class="modal fade" id="modal-default<?php echo $id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Task</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="student_task_id" value="<?php echo $student_task_id; ?>" />
                <div class="form-group">
                    <input type="text" name="fname" id="inputtask" value="<?php echo $result['fname']; ?>" readonly>
                </div>
                <div class="form-control">
                    <label for="comment">Comment</label>
                    <textarea id="assigntextarea" placeholder="Description" name="fdesc"
                        value="<?php echo $result['fdesc']; ?>" required><?php echo $result['fdesc']; ?></textarea>
                </div>
                <div class="form-control">
                    <label for="comment">Comment</label>
                    <textarea id="assigntextarea" placeholder="Description" name="fdesc"
                        value="<?php echo $result['fdesc']; ?>" required><?php echo $result['fdesc']; ?></textarea>
                </div>
                <div class="form-control">
                    <label for="task_status">Status</label>
                    <select name="task_status" class="custom-select custom-select-sm" required>
                        <option value="1" <?php echo $task_status == 1 ? 'selected' : '' ?>>
                            Pending
                        </option>
                        <option value="2" <?php echo $task_status == 2 ? 'selected' : '' ?>>
                            Started
                        </option>
                        <option value="3" <?php echo $task_status == 3 ? 'selected' : '' ?>>
                            On-Progress
                        </option>
                        <option value="4" <?php echo $task_status == 4 ? 'selected' : '' ?>>
                            On-Hold
                        </option>
                        <option value="5" <?php echo $task_status == 5 ? 'selected' : '' ?>>
                            Overdue
                        </option>
                        <option value="6" <?php echo $task_status == 6 ? 'selected' : '' ?>>
                            Done
                        </option>
                    </select>
                </div>
                <div class="form-control">
                    <label for="p_condition">Plants Condition</label>
                    <select name="p_condition" class="custom-select custom-select-sm">
                        <option value="1" <?php echo $p_condition == 1 ? 'selected' : '' ?>>
                            Alive
                        </option>
                        <option value="2" <?php echo $p_condition == 2 ? 'selected' : '' ?>>
                            Withered
                        </option>
                        <option value="3" <?php echo $p_condition == 3 ? 'selected' : '' ?>>
                            Dead
                        </option>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" name="Upload" type="submit" value="Upload">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>