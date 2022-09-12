<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
<?php  include('sidebar.php'); ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> X </button>
    <h3 id="myModalLabel">Change Avatar</h3>
</div>
<div class="modal-body">
    <form method="post" action="teacher_avatar.php" enctype="multipart/form-data">
        <center>
            <div class="control-group">
                <div class="controls">
                    <input name="image" class="input-file uniform_on" id="fileInput" type="file" required>
                </div>
            </div>
        </center>

</div>
<div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="fa-solid fa-close"></i> Close</button>
    <button class="btn btn-info" name="change"><i class="fa-solid fa-save"></i> Save</button>
</div>
</form>