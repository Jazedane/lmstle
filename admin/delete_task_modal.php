		<!-- Modal -->
<div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> X </button>
		<h3 id="myModalLabel">Delete Task</h3>
	</div>
		<div class="modal-body">
		<div class="alert alert-danger">
			Are you sure you want to delete this Task?
		</div>
		</div>
	<div class="modal-footer">
		<form method="post" action="delete_task.php">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="fa-solid fa-remove"></i> Close</button>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
			<button class="btn btn-danger" name="change"><i class="fa-solid fa-check"></i> Yes</button>
		</form>
	</div>
</div>
				