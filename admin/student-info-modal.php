<div class="modal fade" id="student-info<?php echo $get_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?php echo $get_id ?>">
                <input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
                <label class="text-dark mt-3 float-left">Student Name :
                    <?php echo $row['firstname']." ".$row['lastname']?></label> <br>
                <label class="text-dark mt-3 float-left">Task Submitted List: </label>
                <p><?php echo $row['fname'];?></p>
            </div>
        </div>
    </div>
</div>