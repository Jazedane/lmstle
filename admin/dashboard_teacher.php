<?php include 'header.php'; ?>
<?php include 'session.php'; ?>

<body id="class_div">
    <?php include('sidebar.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6" id="content" style="margin-right: 50px">
                <div class="row-fluid">

                    <ul class="breadcrumb">
                        <?php
								$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
								$school_year_query_row = mysqli_fetch_array($school_year_query);
								$school_year = $school_year_query_row['school_year'];
								?>
                        <li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
                        <li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a></li>
                    </ul>

                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="count_class" class="muted pull-left"> Section List </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <?php include('teacher_class.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                $(document).ready(function() {
                    $('.remove').click(function() {
                        var id = $(this).attr("id");
                        $.ajax({
                            type: "POST",
                            url: "delete_class.php",
                            data: ({
                                id: id
                            }),
                            cache: false,
                            success: function(html) {
                                $("#del" + id).fadeOut('slow', function() {
                                    $(this).remove();
                                });
                                $('#' + id).modal('hide');
                                $.jGrowl("Your Class is Successfully Deleted", {
                                    header: 'Class Delete'
                                });
                            }
                        });
                        return false;
                    });
                });
                </script>
            </div>
            <?php include 'teacher_right_sidebar.php' ?>
        </div>
        <?php include'footer.php'; ?>
    </div>
    <?php include 'script.php' ; ?>
</body>