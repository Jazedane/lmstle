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
                                    <input name="uploaded_file" class="form-control" type="file" id="formFileMultiple"
                                        multiple></input>
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
                                <textarea id="assigntextarea" placeholder="Description" name="desc" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" id="status" class="custom-select custom-select-sm">
                                    <option value="1"
                                        <?php echo isset($task_status) && $task_status == 1 ? 'selected' : '' ?>>
                                        Pending
                                    </option>
                                    <option value="3"
                                        <?php echo isset($task_status) && $task_status == 3 ? 'selected' : '' ?>>
                                        On-Hold
                                    </option>
                                    <option value="5"
                                        <?php echo isset($task_status) && $task_status == 5 ? 'selected' : '' ?>>
                                        Done
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Start Date</label>
                                <input type="date" class="form-control form-control-sm" autocomplete="off"
                                    name="start_date"
                                    value="<?php echo isset($start_date) ? datetime("Y-m-d",strtotime($start_date)) : '' ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">End Date</label>
                                <input type="date" class="form-control form-control-sm" autocomplete="off"
                                    name="end_date"
                                    value="<?php echo isset($end_date) ? datetime("Y-m-d",strtotime($end_date)) : '' ?>">
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