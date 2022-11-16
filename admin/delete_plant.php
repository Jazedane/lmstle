            <div class="modal hide fade" id="delete<?php echo $data['id'];?>" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                        <div class="modal-header">
                            <h4 id="myModalLabel" class="modal-title">Delete Plant Info?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Are you sure you want to Remove this Plant Information?
                            </p>
                        </div>
                        <form method="POST" action="del_query.php">
                            <div class="modal-footer justify-content-between">
                                <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                                <button type="button" data-dismiss="modal" class="btn btn-primary">NO</button>
                                <button type="submit" name="delete" class="btn btn-success">YES</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>