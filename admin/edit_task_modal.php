<?php include('header.php'); ?>
<?php include('session.php'); ?>

<?php
$get_id = $_GET['id'];
$post_id = $_GET['post_id'];
$student_task_id = $_GET['student_task_id'];

$query = mysqli_query($conn,"SELECT * FROM student_task
							WHERE student_task_id='$student_task_id'")or die(mysqli_error());
$result = mysqli_fetch_assoc($query);

$task_status = $result['task_status'];
$p_condition = $result['p_condition'];
?>

<body>
    <?php include('sidebar2.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6" id="content">
                <div class="row-fluid">

                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <li id="" class="muted pull-left">
                                <h4><i class="fa-solid fa-plus-circle"></i> Edit Task</h4>
                            </li>
                            <div id="" class="muted pull-right"><a
                                    href="./view_submit_task.php<?php echo '?id='.$get_id ?>&<?php echo 'post_id='.$id ?>">
                                    <i class="fa-solid fa-arrow-left"></i> Back</a>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form class="" action="edit.php<?php echo '?id='.$get_id; ?>" method="post"
                                    enctype="multipart/form-data" name="upload">
                                    <div class="control-group">
                                        <label class="control-label" for="inputtask">Edit Task</label>
                                        <div class="control-group">
                                            <input type="text" name="id" id="inputtask"
                                                value="<?php echo $result['fname']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <label for="comment">Comment</label>
                                            <textarea id="assigntextarea" placeholder="Description" name="desc"
                                                value="<?php echo $result['fdesc']; ?>"
                                                required><?php echo $result['fdesc']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <label for="task_status">Status</label>
                                            <select name="status"
                                                id="<?php echo $get_id; ?>&<?php echo 'id='.$post_id ?>"
                                                class="custom-select custom-select-sm" required>
                                                <option value="1"
                                                    selected="<?php echo isset($task_status) && $task_status == 1 ? 'true' : 'false' ?>">
                                                    On-progress
                                                </option>
                                                <option value="2"
                                                    selected="<?php echo isset($task_status) && $task_status == 2 ? 'true' : 'false' ?>">
                                                    Done
                                                </option>
                                                <option value="3"
                                                    selected="<?php echo isset($task_status) && $task_status == 3 ? 'true' : 'false' ?>">
                                                    Done Late
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <label for="p_condition">Plants Condition</label>
                                            <select name="p_condition"
                                                id="<?php echo $id; ?>&<?php echo 'id='.$post_id ?>"
                                                class="custom-select custom-select-sm">
                                                <option value="1"
                                                    selected="<?php echo isset($p_condition) && $p_condition == 1 ? 'true' : 'false' ?>">
                                                    Alive
                                                </option>
                                                <option value="2"
                                                    selected="<?php echo isset($p_condition) && $p_condition == 2 ? 'true' : 'false' ?>">
                                                    Withered
                                                </option>
                                                <option value="3"
                                                    selected="<?php echo isset($p_condition) && $p_condition == 3 ? 'true' : 'false' ?>">
                                                    Dead
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <center>
                                                <button name="Upload" type="submit" value="Upload"
                                                    class="btn btn-success" /><i class="fa-solid fa-upload"></i> Change
                                                </button>
                                            </center>
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