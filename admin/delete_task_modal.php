<div id="del<?php echo $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 id="myModalLabel" class="modal-title">Remove Task</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to Remove this Task?
            </div>
            <div class="modal-footer justify-content-between">
                <form method="post" action="delete_task.php">
                    <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i>
                        Close</button>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
                    <button class="btn btn-success" name="change"><i class="fas fa-check"></i> Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>