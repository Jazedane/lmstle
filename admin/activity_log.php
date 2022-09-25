<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
    <?php include('sidebar.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span9" id="content">
                <div class="row-fluid">
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Activity Log List</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

                                    <thead>
                                        <tr>

                                            <th>Date</th>
                                            <th>User</th>
                                            <th>Action</th>

                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php
										$query = mysqli_query($conn,"select * from  activity_log")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
									?>

                                        <tr>

                                            <td><?php  echo $row['date']; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['action']; ?></td>
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