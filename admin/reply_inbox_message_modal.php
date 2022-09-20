<div id="reply<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> X </button>
		<h3 id="myModalLabel">Reply</h3>
	</div>
		<div class="modal-body">
	<form  id="reply" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="inputEmail">To:</label>
			<div class="controls">
				<input type="hidden" name="sender_id" id="inputEmail" value="<?php echo $sender_id; ?>" readonly>
				<input type="hidden" name="receiver_name" value="<?php echo $receiver_name; ?>" readonly>
				<input type="text" name="sender_name"  id="inputEmail" value="<?php echo $sender_name; ?>" readonly>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Content:</label>
			<div class="controls">
				<textarea name="my_message" style="height:120px; width: 60%"></textarea>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
			<button type="submit" id="<?php echo $id; ?>" class="btn btn-success reply"><i class="fa-solid fa-reply"></i> Reply</button>
			</div>
		</div>
    </form>
		</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="fa-solid fa-remove"></i> Close</button>
		<button   id="<?php echo $id; ?>" class="btn btn-danger remove" data-dismiss="modal" aria-hidden="true"><i class="fa-solid fa-check"></i> Yes </button>
	</div>
</div>
				
				

			