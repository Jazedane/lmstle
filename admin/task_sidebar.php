<div class="span3" id="">
    <div class="row-fluid" style="margin-top:50px">
        <div id="block_bg" class="block">
            <div class="navbar navbar-inner block-header">
                <div id="" class="muted pull-left">
                    <h4><i class="fa-solid fa-plus-circle"></i> Add Task</h4>
                </div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form class="" action="assign_save.php<?php echo '?id='.$get_id; ?>" method="post"
                        enctype="multipart/form-data" name="upload">
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Task</label>
                        <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">
                                <input name="uploaded_file" class="form-control" type="file" id="formFileMultiple" multiple></input>
                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                <input type="hidden" name="id" value="<?php echo $session_id ?>" />
                                <input type="hidden" name="id_class" value="<?php echo $get_id; ?>">
                            </div>
                        </div>
                        <div class="control-group">

                            <div class="controls">
                                <input type="text" name="name" Placeholder="Task Name" class="input">
                            </div>
                        </div>
                        <div class="control-group">

                            <div class="controls">
                                <textarea id="assigntextare" placeholder="Description" name="desc" required></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">

                                <button name="Upload" type="submit" value="Upload" class="btn btn-success" /><i
                                    class="fa-solid fa-upload"></i> Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>