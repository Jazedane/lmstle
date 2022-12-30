            <div class="modal hide fade" id="delete<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                        <div class="modal-header">
                            <h4 id="myModalLabel" class="modal-title">Delete Task?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Are you sure you want to delete task?
                            </p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" data-dismiss="modal" class="btn btn-primary"><i
                                    class="fas fa-times"></i> No</button>
                            <button id="<?php echo $id;?>" class="btn btn-success delete-task"><i
                                    class="fas fa-check"></i> Yes</button>
                        </div>
                    </div>
                </div>
            </div>