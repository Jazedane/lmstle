<?php include 'header.php'; ?>
<?php include 'session.php'; ?>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3" id="adduser">
                <?php include 'add_user.php'; ?>
            </div>
            <div class="span6" id="">
                <div class="row-fluid">
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Teacher List</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form action="delete_teacher.php" method="post">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                        <a data-toggle="modal" href="#teacher_delete" id="delete" class="btn btn-danger"
                                            name=""><i class="fa-solid fa-trash-can"></i></a>
                                        <?php include 'modal_delete.php'; ?>
                                        <ul data-toggle="modal" href="#teacher_restore" id="delete"
                                            class="btn btn-primary" name=""><i class="fa-solid fa-recycle"></i> Restore
                                            Data</ul>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Username</th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            ($teacher_query = mysqli_query(
                                                $conn,
                                                'SELECT * FROM teacher WHERE isDeleted=false'
                                            )) or die(mysqli_error());
                                            while (
                                                $row = mysqli_fetch_array(
                                                    $teacher_query
                                                )
                                            ) {
                                                $id = $row['teacher_id']; ?>

                                            <tr>
                                                <td width="30">
                                                    <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                        type="checkbox" value="<?php echo $id; ?>">
                                                </td>
                                                <td><?php
                                                $firstname = $row['firstname'];
                                                $lastname = $row['lastname'];
                                                $firstname = strtoupper(
                                                    $firstname
                                                );
                                                $lastname = strtoupper(
                                                    $lastname
                                                );
                                                echo $lastname .
                                                    ', ' .
                                                    $firstname;
                                                ?></td>
                                                <td><?php
                                                $username = $row['username'];
                                                $username = strtoupper(
                                                    $username
                                                );
                                                echo $username;
                                                ?></td>

                                                <td width="40">
                                                    <a href="edit_teacher.php<?php echo '?id=' .
                                                        $id; ?>" data-toggle="modal" class="btn btn-success"><i
                                                            class="fa-solid fa-edit"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>
    <?php include 'script.php'; ?>
</body>

</html>