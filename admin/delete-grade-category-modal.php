<div id="delete<?php echo $grade_category_row['grade_category_id'];?>" class="modal fade" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 id="myModalLabel" class="modal-title">Delete Grade Category?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the grade category?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button class="btn btn-primary" data-dismiss="modal" class="btn btn-outline-light"><i
                        class="fas fa-times"></i>
                    Close</button>
                <button id="<?php echo $grade_category_row['grade_category_id'];?>" class="btn btn-success delete_category"><i class="fas fa-check"></i> Yes</button>
            </div>
        </div>
    </div>
</div>