<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
    <?php include('sidebar2.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6" id="content">
                <div class="row-fluid">

                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left">
                                <h4><i class="fa-solid fa-plus-circle"></i> Edit Task</h4>
                            </div>
                            <div id="" class="muted pull-right"><a
                                    href="view_submit_task.php?id=$get_id">
                                    <i class="fa-solid fa-arrow-left"></i> Back</a>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form class="" action="edit.php<?php echo '?id='.$get_id; ?>" method="post"
                                    enctype="multipart/form-data" name="upload">
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail">Edit Task</label>
                                        <div class="control-group">
                                            <input type="hidden" name="id" value="<?php echo $id ?>" />
                                            <input type="hidden" name="get_id" value="<?php echo $get_id ?>" />
                                            <input type="text" name="task_name" id="inputEmail"
                                                value="<?php echo $task_name; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <label for="comment">Comment</label>
                                            <textarea id="assigntextarea" placeholder="Description" name="desc"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <label for="task_status">Status</label>
                                            <select name="status" id="<?php echo $id; ?>"
                                                class="custom-select custom-select-sm">
                                                <option value="1"
                                                    <?php echo isset($task_status) && $task_status == 1 ? 'selected' : '' ?>>
                                                    Pending
                                                </option>
                                                <option value="2"
                                                    <?php echo isset($task_status) && $task_status == 2 ? 'selected' : '' ?>>
                                                    On-Progress
                                                </option>
                                                <option value="3"
                                                    <?php echo isset($task_status) && $task_status == 3 ? 'selected' : '' ?>>
                                                    Done
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button name="Upload" type="submit" value="Upload"
                                                class="btn btn-success" /><i class="fa-solid fa-upload"></i> Change
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php include('footer.php'); ?>
                </div>
                <?php include('script.php'); ?>
            </div>
        </div>
    </div>
</body>

</html>