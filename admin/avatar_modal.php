<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
    <?php include('sidebar.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span9" id="content">
                <div class="row-fluid">

                    <ul class="breadcrumb">
                        <?php
								$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
								$school_year_query_row = mysqli_fetch_array($school_year_query);
								$school_year = $school_year_query_row['school_year'];
								?>
                        <li><a href="#"><b>Change Avatar</b></a><span class="divider">/</span></li>
                        <li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a></li>
                    </ul>

                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left"></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <div class="alert alert-info"><i class="fa-solid fa-image"></i> Change Avatar
                                </div>
                                <?php
								$query = mysqli_query($conn,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								?>
                                <div class="row-fluid">
                                    <form method="post" action="teacher_avatar.php" enctype="multipart/form-data">
                                        <center>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <input name="image" class="input-file uniform_on" id="fileInput"
                                                        type="file" required>
                                                </div>
                                            </div>
                                        </center>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-info" name="change"><i class="fa-solid fa-save"></i>
                                        Save</button>
                                </div>
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