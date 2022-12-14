<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
    <?php include('sidebar2.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span9" id="content">
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
                        <li><a href="#"><b>Tasks Uploaded List</b></a></li>
                    </ul>

                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Task Uploaded List</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

                                    <thead>
                                        <tr>
                                            <th>Date Upload</th>
                                            <th>Task Name</th>
                                            <th>Description</th>
                                            <th>Due Date</th>
                                            <th>Upload By</th>
                                            <th>Class</th>

                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php
										$query = mysqli_query($conn,"select * FROM task LEFT JOIN teacher ON teacher.teacher_id = task.teacher_id
																				  LEFT JOIN teacher_class ON teacher_class.teacher_class_id = task.class_id and task.isDeleted=false
																				  INNER JOIN class ON class.class_id = teacher_class.class_id  ")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
									?>
                                        <tr>
                                            <td><?php echo $row['fdatein']; ?></td>
                                            <td><?php  echo $row['fname']; ?></td>
                                            <td><?php echo $row['fdesc']; ?></td>
                                            <td><?php echo $row['end_date']; ?></td>
                                            <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                            <td><?php echo $row['class_name']; ?></td>


                                        </tr>

                                        <?php } ?>


                                    </tbody>
                                </table>
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