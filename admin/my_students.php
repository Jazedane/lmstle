<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Class</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>
    <?php $get_id = $_GET['id']; ?>
</head>

<body>
    <?php include 'homepage2.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Class</h1>
                    </div>
                    <?php $class_query = mysqli_query($conn,"select * from tbl_teacher_class
	                            LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id
	                            where teacher_class_id = '$get_id'")or die(mysqli_error());
	                            $class_row = mysqli_fetch_array($class_query);
	                        ?>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"><?php echo $class_row['class_name']; ?></a> <span
                                    class="divider"></span></li>
                            <li class="breadcrumb-item">School Year: <?php echo $class_row['school_year']; ?></a> <span
                                    class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#"><b>My Students</b></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <?php 
								        $my_student = mysqli_query($conn,"SELECT * FROM tbl_teacher_class_student
								        						LEFT JOIN tbl_student ON tbl_student.student_id = tbl_teacher_class_student.student_id 
                                                                and tbl_student.isDeleted=false
								        						INNER JOIN tbl_class ON tbl_class.class_id = tbl_student.class_id 
                                                                where teacher_class_id = '$get_id' order by lastname ")or die(mysqli_error());
								        $count_my_student = mysqli_num_rows($my_student);?>Number of Students: <span
                                    class="badge badge-info"><?php echo $count_my_student; ?></span>
                            </div>
                            <div class="card-body">
                                <ul class="row">
                                    <?php
										$my_student = mysqli_query($conn,"SELECT * FROM tbl_teacher_class_student
										LEFT JOIN tbl_student ON tbl_student.student_id = tbl_teacher_class_student.student_id 
                                        and tbl_student.isDeleted=false
										INNER JOIN tbl_class ON tbl_class.class_id = tbl_student.class_id 
                                        where teacher_class_id = '$get_id' order by lastname ")or die(mysqli_error());
											while($row = mysqli_fetch_array($my_student)){
											$id = $row['teacher_class_student_id'];
									?>
                                    <div id="del<?php echo $id; ?>" style="margin:10px">
                                        <center><a href="#">
                                                <img id="student_avatar_class"
                                                    src="/lmstlee4/admin/<?php echo $row['location'] ?>" width="80"
                                                    height="80" class="img-polaroid">
                                                <div>
                                                    <span>
                                                        <p><?php ?></p>
                                                    </span>
                                                </div>
                                            </a>

                                            <p class="student">
                                                <?php echo $row['firstname']." <br> ".$row['lastname']?></p>
                                        </center>
                                    </div>
                                    <?php } ?>
                                </ul>
                                <script type="text/javascript">
                                $(document).ready(function() {
                                    $('.remove').click(function() {
                                        var id = $(this).attr("id");
                                        $.ajax({
                                            type: "POST",
                                            url: "remove_student.php",
                                            data: ({
                                                id: id
                                            }),
                                            cache: false,
                                            success: function(html) {
                                                $("#del" + id).fadeOut('slow',
                                                    function() {
                                                        $(this).remove();
                                                    });
                                                $('#' + id).modal('hide');
                                                $.jGrowl(
                                                    "Your Student is Successfully Remove", {
                                                        header: 'Student Remove'
                                                    });
                                            }
                                        });
                                        return false;
                                    });
                                });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>

</body>

</html>