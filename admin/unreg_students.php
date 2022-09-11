<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('sidebar.php'); ?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3" id="adduser">
            <?php include('add_students.php'); ?>
        </div>
        <div class="span6" id="">
            <div class="row-fluid">
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Student List</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12" id="studentTableDiv">
                            <?php include('student_table_unreg.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>