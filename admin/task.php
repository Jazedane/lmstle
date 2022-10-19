<?php include 'header.php'; ?>
<?php include 'session.php'; ?>
<?php $get_id = $_GET['id']; ?>

<body>
    <?php include 'sidebar2.php'; ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span7" id="content">
                <div class="row-fluid">

                    <ul class="breadcrumb">
                        <?php
                        ($class_query = mysqli_query(
                            $conn,
                            "SELECT * FROM teacher_class
							LEFT JOIN class ON class.class_id = teacher_class.class_id
							WHERE teacher_class_id = '$get_id'"
                        )) or die(mysqli_error());
                        $class_row = mysqli_fetch_array($class_query);
                        $class_id = $class_row['class_id'];
                        ?>

                        <li><a href="#"><?php echo $class_row[
                            'class_name'
                        ]; ?></a> <span class="divider">/</span></li>
                        <li><a href="#">School Year: <?php echo $class_row[
                            'school_year'
                        ]; ?></a> <span class="divider">/</span></li>
                        <li><a href="#"><b>Tasks List</b></a></li>
                    </ul>

                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left"></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                    <a data-toggle="modal" href="#task_restore" id="delete" class="btn btn-primary"
                                        name=""><i class="fa-solid fa-recycle"></i> Restore
                                        Data</a>
                                    <thead>
                                        <tr>
                                            <th>Date Upload</th>
                                            <th>Task Name</th>
                                            <th>Description</th>
                                            <th>Due Date</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        ($query = mysqli_query(
                                            $conn,
                                            "SELECT * FROM task 
                                            WHERE class_id = '$get_id' AND teacher_id = '$session_id' AND isDeleted=false
                                            ORDER BY fdatein DESC "
                                        )) or die(mysqli_error());
                                        while (
                                            $row = mysqli_fetch_array($query)
                                        ) {

                                            $id = $row['task_id'];
                                            $floc = $row['floc'];
                                            ?>
                                        <tr>
                                            <td><?php echo $row[
                                                'fdatein'
                                            ]; ?></td>
                                            <td><?php echo $row[
                                                'fname'
                                            ]; ?></td>
                                            <td><?php echo $row[
                                                'fdesc'
                                            ]; ?></td>
                                            <td><?php echo $row[
                                                'end_date'
                                            ]; ?></td>
                                            <td width="10">
                                                <form method="post" action="view_submit_task.php<?php echo '?id=' .
                                                        $get_id; ?>&<?php echo 'post_id=' . $id; ?>">

                                                    <button data-placement="bottom" title="View Student Who Submit Task"
                                                        id="<?php echo $id; ?>view" class="btn btn-success"><i
                                                            class="fa-solid fa-folder"></i></button>

                                                </form>
                                            </td>
                                            <td width="10">
                                                <form method="post" action="view_notsubmit_task.php<?php echo '?id=' .
                                                        $get_id; ?>&<?php echo 'post_id=' . $id; ?>">

                                                    <button data-placement="bottom"
                                                        title="View Student Who Did Not Submit Task"
                                                        id="<?php echo $id; ?>viewnot" class="btn btn-info"><i
                                                            class="fa-solid fa-folder"></i></button>

                                                </form>
                                            </td>
                                            <td>
                                                <?php if ($floc == '') {
                                                } else {
                                                     ?>
                                                <?php
                                                } ?>
                                                <a data-placement="bottom" title="Remove" id="<?php echo $id; ?>remove"
                                                    class="btn btn-danger" href="#<?php echo $id; ?>"
                                                    data-toggle="modal"><i class="fa-solid fa-remove"></i></a>
                                                <?php include 'delete_task_modal.php'; ?>
                                            </td>
                                            <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#<?php echo $id; ?>remove').tooltip('show');
                                                $('#<?php echo $id; ?>remove').tooltip('hide');
                                            });
                                            </script>
                                            <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#<?php echo $id; ?>view').tooltip('show');
                                                $('#<?php echo $id; ?>view').tooltip('hide');
                                            });
                                            </script>
                                            <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#<?php echo $id; ?>viewnot').tooltip('show');
                                                $('#<?php echo $id; ?>viewnot').tooltip('hide');
                                            });
                                            </script>
                                            <?php
                                        }
                                        ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'task_sidebar.php'; ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    </div>
    <?php include 'script.php'; ?>
</body>

</html>