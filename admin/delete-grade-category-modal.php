<div id="delete<?php echo $grade_category_row['grade_category_id'];?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
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
            <form method="post" action="delete-grade-category.php">
                <div class="modal-footer justify-content-between">
                    <button class="btn" data-dismiss="modal" class="btn btn-outline-light"><i class="fas fa-times"></i>
                        Close</button>
                    <input type="hidden" name="grade_category_id" value="<?php echo $grade_category_row['grade_category_id'];?>">
                    <input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
                    <button name="delete_category" class="btn btn-danger"><i class="fas fa-check"></i> Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>