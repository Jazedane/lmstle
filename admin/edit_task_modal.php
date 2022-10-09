<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> X </button>
        <h3 id="myModalLabel">Edit Task</h3>
    </div>
    <div class="modal-body">
        <form action="form-horizontal" id="edit">
            <div class="form-group">
                <label for="task">Task</label>
                <input type="text" class="form-control form-control-sm" name="task" value="<?php echo $task_id; ?>">
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea name="description" id="" cols="30" rows="10" class="summernote form-control">
			</textarea>
            </div>
            <div class="form-group">
                <label for="task_status">Status</label>
                <select name="status" id="<?php echo $id; ?>" class="custom-select custom-select-sm">
                    <option value="1" <?php echo isset($task_status) && $task_status == 1 ? 'selected' : '' ?>>Pending </option>
                    <option value="2" <?php echo isset($task_status) && $task_status == 2 ? 'selected' : '' ?>>On-Progress </option>
                    <option value="3" <?php echo isset($task_status) && $task_status == 3 ? 'selected' : '' ?>>Done </option>
                </select>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="fa-solid fa-remove"></i> Close</button>
        <button id="<?php echo $id; ?>" class="btn btn-danger remove" data-dismiss="modal" aria-hidden="true"><i
                class="fa-solid fa-check"></i> Yes </button>
    </div>
</div>