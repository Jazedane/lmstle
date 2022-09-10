<?php  include('header.php'); ?>
<?php  include('session.php'); ?>

<?php include('sidebar.php'); ?>

<div class="container-fluid main-content">
    <div class="row-fluid">
        <!--/span-->
        <div class="span9" id="content">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Data Numbers</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">

                            <?php 
								    $query_student = mysqli_query($conn,"select * from student where status='Registered'")or die(mysqli_error());
								    $count_student = mysqli_num_rows($query_student);
								    ?>

                            <div class="span4">
                                <div class="chart" data-percent="<?php echo $count_student ?>">
                                    <?php echo $count_student ?></div>
                                <div class="chart-bottom-heading"><strong>Registered Students</strong></div>
                            </div>

                            <?php 
								    $query_student = mysqli_query($conn,"select * from student")or die(mysqli_error());
								    $count_student = mysqli_num_rows($query_student);
								    ?>

                            <div class="span4">
                                <div class="chart" data-percent="<?php echo $count_student ?>">
                                    <?php echo $count_student ?></div>
                                <div class="chart-bottom-heading"><strong>Students</strong></div>
                            </div>

                            <?php 
								    $query_class = mysqli_query($conn,"select * from class")or die(mysqli_error());
								    $count_class = mysqli_num_rows($query_class);
								    ?>

                            <div class="span4">
                                <div class="chart" data-percent="<?php echo $count_class; ?>">
                                    <?php echo $count_class; ?></div>
                                <div class="chart-bottom-heading"><strong>Section</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>
        </div>
    </div>
</div>
<?php include('script.php'); ?>

<?php include('footer.php'); ?>