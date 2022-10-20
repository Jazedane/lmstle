<?php include('header.php'); ?>
<?php include('session.php'); ?>

<?php
$get_id = $_GET['id'];
$post_id = $_GET['post_id'];
$student_task_id = $_GET['student_task_id'];

echo "SELECT * FROM student_task WHERE student_task_id='$student_task_id'";

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
                                    
                                    <input type="hidden" name="student_task_id" value="<?php echo $student_task_id; ?>" />

                                    <div class="control-group">
                                        <label class="control-label" for="inputtask">Edit Task</label>
                                        <div class="control-group">
                                            <input type="text" name="fname" id="inputtask"
                                                value="<?php echo $result['fname']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <label for="comment">Comment</label>
                                            <textarea id="assigntextarea" placeholder="Description" name="fdesc"
                                                value="<?php echo $result['fdesc']; ?>"
                                                required><?php echo $result['fdesc']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <label for="task_status">Status</label>
                                            <select name="task_status" required>
                                                class="custom-select custom-select-sm" required>
                                                <option value="1" <?php echo $task_status == 1 ? 'selected' : '' ?>>
                                                    Pending
                                                </option>
                                                <option value="2" <?php echo $task_status == 2 ? 'selected' : '' ?>>
                                                    Started
                                                </option>
                                                <option value="3" <?php echo $task_status == 3 ? 'selected' : '' ?>>
                                                    On-Progress
                                                </option>
                                                <option value="4" <?php echo $task_status == 4 ? 'selected' : '' ?>>
                                                    On-Hold
                                                </option>
                                                <option value="5" <?php echo $task_status == 5 ? 'selected' : '' ?>>
                                                    Overdue
                                                </option>
                                                <option value="6" <?php echo $task_status == 6 ? 'selected' : '' ?>>
                                                    Done
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <label for="p_condition">Plants Condition</label>
                                            <select name="p_condition" class="custom-select custom-select-sm">
                                                <option value="1" <?php echo $p_condition == 1 ? 'selected' : '' ?>>
                                                    Alive
                                                </option>
                                                <option value="2" <?php echo $p_condition == 2 ? 'selected' : '' ?>>
                                                    Withered
                                                </option>
                                                <option value="3" <?php echo $p_condition == 3 ? 'selected' : '' ?>>
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