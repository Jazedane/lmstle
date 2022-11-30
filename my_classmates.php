<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Class</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
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
                    <div class="col-sm-6">
                        <?php $query = mysqli_query($conn,"select * from tbl_teacher_class_student
					LEFT JOIN tbl_teacher_class ON tbl_teacher_class.teacher_class_id = tbl_teacher_class_student.teacher_class_id 
                    LEFT JOIN tbl_school_year ON tbl_school_year.school_year_id = tbl_teacher_class.school_year_id
					JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id 
					where student_id = '$session_id'
					")or die(mysqli_error());
					$row = mysqli_fetch_array($query);
					$id = $row['teacher_class_student_id'];	
					?>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"><?php echo $row['class_name']; ?></a> <span
                                    class="divider"></span></li>
                            <li class="breadcrumb-item">School Year: <?php echo $row['school_year']; ?></a> <span
                                    class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#"><b>My Classmates</b></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-success">
                            <div class="card-header">
                                <?php 
                                    $my_profile_query = mysqli_query($conn, "SELECT * FROM tbl_student WHERE student_id = '$session_id'")or die(mysqli_error());
                                    $my_profile = mysqli_fetch_array($my_profile_query);
                                ?>
                                You
                            </div>
                            <div class="card-body">
                                <center><img id="student_avatar_class"
                                    src="/lmstlee4/admin/uploads/<?php echo $my_profile['location'] ?>" width="80" height="80"
                                    class="img-circle elevation-2"/>
                                <div>
                                    <span><?php echo $my_profile['firstname']; ?> <?php echo $my_profile['lastname'] ?> </span>
                                </div>
                                </center>
                            </div>
                        </div>
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
														LEFT JOIN tbl_student ON tbl_student.student_id = tbl_teacher_class_student.student_id AND tbl_student.isDeleted=false
														INNER JOIN tbl_class ON tbl_class.class_id = tbl_student.class_id 
                                                        WHERE teacher_class_id = '$get_id' AND NOT tbl_teacher_class_student.student_id = '$session_id'
                                                        ORDER BY lastname") or die(mysqli_error());
								$count_my_student = mysqli_num_rows($my_student);?>
                                Your Classmates: <span class="badge badge-info"><?php echo $count_my_student; ?></span>
                            </div>
                            <div class="card-body">
                                <ul class="row">
                                    <?php
										$my_student = mysqli_query($conn,"SELECT *
										FROM tbl_teacher_class_student
										LEFT JOIN tbl_student ON tbl_student.student_id = tbl_teacher_class_student.student_id AND tbl_student.isDeleted=false
										INNER JOIN tbl_class ON tbl_class.class_id = tbl_student.class_id 
                                        WHERE teacher_class_id = '$get_id' AND NOT tbl_teacher_class_student.student_id = '$session_id'
                                        ORDER BY lastname")or die(mysqli_error());
														
										while($row = mysqli_fetch_array($my_student)){
										$id = $row['teacher_class_student_id'];
									?>

                                    <div id="del<?php echo $id; ?>" style="margin:10px">
                                        <center><a href="#">
                                                <img id="student_avatar_class"
                                                    src="admin/uploads/<?php echo $row['location'] ?>" width="80" height="80"
                                                    class="img-circle elevation-2">
                                            </a>
                                            <p class="class"><?php echo $row['firstname']."<br> ".$row['lastname']?></p>
                                        </center>
                                    </div>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>
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
</body>

</html>