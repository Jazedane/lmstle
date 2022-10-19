<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
    <?php include('sidebar.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3" id="adduser">
                <?php include('edit_class_form.php'); ?>
            </div>
            <div class="span6" id="">
                <div class="row-fluid">
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Class List</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form action="delete_class.php" method="post">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                        <a data-toggle="modal" href="#class_delete" id="delete" class="btn btn-danger"
                                            name=""><i class="fa-solid fa-trash-can"></i></a>
                                        <?php include('modal_delete.php'); ?>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Year And Section</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
										$class_query = mysqli_query($conn,"select * from class where class.isDeleted=false")or die(mysqli_error());
										while($class_row = mysqli_fetch_array($class_query)){
										$id = $class_row['class_id'];
										?>

                                            <tr>
                                                <td width="30">
                                                    <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                        type="checkbox" value="<?php echo $id; ?>">
                                                </td>
                                                <td><?php
                                                $class_name =
                                                    $class_row['class_name'];
                                                $class_name = strtoupper(
                                                    $class_name
                                                );
                                                echo $class_name;
                                                ?></td>
                                                <td width="40"><a href="edit_class.php<?php echo '?id='.$id; ?>"
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