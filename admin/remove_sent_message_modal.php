<div id="del<?php echo $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 id="myModalLabel" class="modal-title">Remove Sent Message</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    Are you sure you want to Remove this sent message?
            </div>
            <div class="modal-footer justify-content-between">
                <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i>
                    Close</button>
                <button id="<?php echo $id; ?>" class="btn btn-success remove" data-dismiss="modal" aria-hidden="true"><i
                        class="fas fa-check"></i> Yes</button>
            </div>
        </div>
    </div>
</div>