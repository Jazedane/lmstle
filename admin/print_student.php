<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
    <?php include('sidebar2.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span9" id="content">
                <div class="row-fluid">
                    <?php include('my_students_breadcrumb.php'); ?>
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left"><a href="my_students.php<?php echo '?id='.$get_id; ?>">
                                    <i class="fa-solid fa-arrow-left"></i> Back</a>
                            </div>
                            <li class="pull-right">

                                <a id="print" onclick="window.print()" class="btn btn-info"><i
                                        class="fa-solid fa-print"></i> Print Student List</a>
                            </li>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">

                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

                                    <thead>
                                        <tr>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php
											$my_student = mysqli_query($conn,"SELECT * FROM teacher_class_student
											LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
											INNER JOIN class ON class.class_id = student.class_id where teacher_class_id = '$get_id' order by lastname ")or die(mysqli_error());
											while($row = mysqli_fetch_array($my_student)){
											$id = $row['teacher_class_student_id'];
										?>
                                        <tr id="del<?php echo $id; ?>">

                                            <td><?php echo $row['firstname']; ?></td>
                                            <td><?php  echo $row['lastname']; ?></td>

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