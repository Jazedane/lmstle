<div id="reply<?php echo $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-success">
            <div class="modal-header">
                <h4 id="myModalLabel" class="modal-title">Reply</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="reply" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label" for="inputEmail">To:</label>
                        <div class="controls">
                            <input type="hidden" name="sender_id" id="inputEmail" value="<?php echo $sender_id; ?>"
                                readonly>
                            <input type="hidden" name="receiver_name" value="<?php echo $receiver_name; ?>" readonly>
                            <input type="text" class="form-control" name="sender_name" id="inputEmail" value="<?php echo $sender_name; ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputPassword">Content:</label>
                        <div class="controls">
                            <textarea name="my_message" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <center>
                                <button type="submit" id="<?php echo $id; ?>" class="btn btn-primary reply"><i
                                        class="fas fa-reply"></i> Reply</button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button class="btn btn-info" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i>
                    Close</button>
                <button id="<?php echo $id; ?>" class="btn btn-danger remove" data-dismiss="modal" aria-hidden="true"><i
                        class="fas fa-check"></i> Yes </button>
            </div>
        </div>
    </div>
</div>