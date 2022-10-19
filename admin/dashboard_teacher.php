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
                            <div id="count_class" class="muted pull-left"> Section List:
                                <?php
                                ($query = mysqli_query(
                                    $conn,
                                    "SELECT * FROM teacher_class_student
                                    LEFT JOIN teacher_class ON teacher_class_student.teacher_class_id = teacher_class.teacher_class_id 
                                    LEFT JOIN class ON class.class_id = teacher_class.class_id 
                                    WHERE teacher_class_student_id = '$session_id' and school_year = '$school_year' AND class.isDeleted = false"
                                )) or die(mysqli_error());
                                $count = mysqli_num_rows($query);
                                ?>
                                <span class="badge badge-info"><?php echo $count; ?></span>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12" style="width:100%">
                                <?php include('teacher_class.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                $(document).ready(function() {
                    $('.remove').click(function() {
                        var id = $(this).attr("id");
                        var name = $(this).attr("name");
                        $.ajax({
                            type: "POST",
                            url: "delete_class.php",
                            data: ({
                                id: id
                            }),
                            cache: false,
                            success: function(html) {
                                $("#del" + name).fadeOut('slow', function() {
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
            <?php include 'add_classes.php' ?>
        </div>
        <?php include'footer.php'; ?>
    </div>
    <?php include 'script.php' ; ?>
</body>