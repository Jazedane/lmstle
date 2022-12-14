<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
    <?php include('sidebar.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3" id="adduser">
                <?php include('edit_students_form.php'); ?>
            </div>
            <div class="span6" id="">
                <div class="row-fluid">
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Student List</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form action="delete_student.php" method="post">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                        <a data-toggle="modal" href="#student_delete" id="delete" class="btn btn-danger"
                                            name=""><i class="fa-solid fa-trash-can"></i></a>
                                        <?php include('modal_delete.php'); ?>
                                        <thead>
                                            <tr>
                                                <th></th>

                                                <th>Name</th>
                                                <th>ID Number</th>
                                                <th>Gender</th>
                                                <th>Age</th>
                                                <th>Year & Section</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                    $query = mysqli_query($conn,"select * from student LEFT JOIN class ON class.class_id = student.class_id 
                                    WHERE student.isDeleted=false
                                    ORDER BY student.student_id DESC") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['student_id'];
                                        ?>

                                            <tr>
                                                <td width="30">
                                                    <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                        type="checkbox" value="<?php echo $id; ?>">
                                                </td>

                                                <td><?php $firstname = $row['firstname'];
						                                  $lastname = $row['lastname'];
						                                  $firstname = strtoupper ($firstname);
						                                  $lastname = strtoupper($lastname);
						                                  echo $firstname .' '. $lastname; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php $gender = $row['gender'];
					                                      $gender = strtoupper ($gender);
					                                                echo $gender ?></td>
                                                <td><?php echo $row['age']; ?></td>

                                                <td width="100"><?php $class_name = $row['class_name'];
					                                                  $class_name = strtoupper ($class_name);
					                                                                echo $class_name ?></td>

                                                <td width="30"><a href="edit_student.php<?php echo '?id='.$id; ?>"
                                                        class="btn btn-success"><i class="fa-solid fa-edit"></i> </a>
                                                </td>

                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </form>
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