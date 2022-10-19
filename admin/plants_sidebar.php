<div class="span3" id="">
    <div class="row-fluid" style="margin-top:50px">
        <div id="block_bg" class="block">
            <div class="navbar navbar-inner block-header">
                <div id="" class="muted pull-left">
                    <h4><i class="fa-solid fa-plus-circle"></i> Upload Plant</h4>
                </div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form id="add_plant" method="post" enctype="multipart/form-data">
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Plants</label>
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">
                                    <input name="uploaded_file" class="form-control" type="file" id="formFileMultiple"
                                        multiple></input>
                                    <input type="hidden" name="id" value="<?php echo $session_id ?>" />
                                    <input type="hidden" name="teacher_class_id" value="<?php echo $get_id; ?>">
                                    <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                            </div>
                            <div class="control-group">

                                <div class="controls">
                                    <input type="text" name="name" Placeholder="Plant Name" class="input"
                                        style="width:100%" required>
                                </div>
                            </div>
                            <div class="control-group">

                                <div class="controls">
                                    <textarea id="assigntextarea" placeholder="Description" name="desc"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <center>
                                    <div class="controls">
                                        <button name="Upload" type="submit" value="Upload" class="btn btn-success" /><i
                                            class="fa-solid fa-upload"></i> Upload</button>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>