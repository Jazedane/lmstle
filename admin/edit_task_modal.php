<div id="edit-task<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> X </button>
        <h3 id="myModalLabel">Edit Task</h3>
    </div>
    <div class="modal-body">
        <form action="" id="edit-task">
            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
            <div class="form-group">
                <label for="">Task</label>
                <input type="text" class="form-control form-control-sm" name="task"
                    value="<?php echo isset($task) ? $task : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" cols="30" rows="10" class="summernote form-control">
			</textarea>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="task_status" class="custom-select custom-select-sm">
                    <option value="1" <?php echo isset($task_status) && $task_status == 1 ? 'selected' : '' ?>>Pending</option>
                    <option value="2" <?php echo isset($task_status) && $task_status == 2 ? 'selected' : '' ?>>On-Progress
                    </option>
                    <option value="3" <?php echo isset($task_status) && $task_status == 3 ? 'selected' : '' ?>>Done</option>
                </select>
            </div>
        </form>
    </div>
</div>