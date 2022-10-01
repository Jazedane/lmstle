<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
    <?php include('sidebar2.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span9" id="content">
                <div class="row-fluid">

                    <?php $class_query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										where teacher_class_id = '$get_id'")or die(mysqli_error());
										$class_row = mysqli_fetch_array($class_query);
										?>

                    <ul class="breadcrumb">
                        <li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
                        <li><a href="#">School Year: <?php echo $class_row['school_year']; ?></a> <span
                                class="divider">/</span></li>
                        <li><a href="#"><b>Uploaded Tasks</b></a></li>
                    </ul>

                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <?php $query = mysqli_query($conn,"select * FROM task where class_id = '$get_id'  order by fdatein DESC")or die(mysqli_error()); 
									  $count  = mysqli_num_rows($query);
								?>
                            <div id="" class="muted pull-right"><span
                                    class="badge badge-info"><?php echo $count; ?></span></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <?php
									$query = mysqli_query($conn,"select * FROM task where class_id = '$get_id'  order by fdatein DESC")or die(mysqli_error());
									$count = mysqli_num_rows($query);
									if ($count == '0'){?>
                                <div class="alert alert-info">No Task Currently Uploaded</div>
                                <?php
									}else{
								?>
                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="">

                                    <thead>
                                        <tr>
                                            <th>Date Upload</th>
                                            <th>Task Name</th>
                                            <th>Description</th>
                                            <th>Due Date</th>
                                            <th></th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php
										$query = mysqli_query($conn,"select * FROM task where class_id = '$get_id'  order by fdatein DESC")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
										$id  = $row['task_id'];
										$floc = $row['floc'];
									?>
                                        <tr>
                                            <td><?php echo $row['fdatein']; ?></td>
                                            <td><?php  echo $row['fname']; ?></td>
                                            <td><?php echo $row['fdesc']; ?></td>
                                            <td><?php echo $row['end_date']; ?></td>
                                            <td></td>
                                            <td width="220">
                                                <form id="assign_save" method="post"
                                                    action="submit_task.php<?php echo '?id='.$get_id ?>&<?php echo 'post_id='.$id ?>">
                                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                    <?php
											if ($floc == ""){
											}else{
										 ?>
                                                    <a data-placement="bottom" title="Download"
                                                        id="<?php echo $id; ?>download" class="btn btn-info"
                                                        href="admin/<?php echo $row['floc']; ?>"><i
                                                            class="fa-solid fa-download"></i></a>
                                                    <?php } ?>
                                                    <button data-placement="bottom" title="Submit Task"
                                                        id="<?php echo $id; ?>submit" class="btn btn-success"
                                                        name="btn_task"><i class="fa-solid fa-upload"></i> Submit
                                                        Task</button>
                                            </td>
                                            <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#<?php echo $id; ?>submit').tooltip('show');
                                                $('#<?php echo $id; ?>submit').tooltip('hide');
                                            });
                                            </script>
                                            <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#<?php echo $id; ?>download').tooltip('show');
                                                $('#<?php echo $id; ?>download').tooltip('hide');
                                            });
                                            </script>


                                        </tr>

                                        <?php } ?>


                                    </tbody>
                                </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
    <?php include('script.php'); ?>
</body>

</html>