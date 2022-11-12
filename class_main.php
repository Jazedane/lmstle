<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Class</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
</head>

<body>
    <?php include 'homepage.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Class</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <?php
                        ($school_year_query = mysqli_query(
                            $conn,
                            'select * from tbl_school_year order by school_year DESC'
                        )) or die(mysqli_error());
                        $school_year_query_row = mysqli_fetch_array(
                            $school_year_query
                        );
                        $school_year = $school_year_query_row['school_year'];
                        ?>
                            <li class="breadcrumb-item"><a href="#"><b>Home</b></a><span class="divider"></span></li>
                            <li class="breadcrumb-item">School Year: <?php echo $school_year_query_row[
                            'school_year'
                        ]; ?></a></li>
                            <li class="breadcrumb-item active">Class</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Your Class : </h3>
                    <?php
                                ($query = mysqli_query(
                                    $conn,
                                    "SELECT * FROM tbl_teacher_class_student
                                    LEFT JOIN tbl_teacher_class ON tbl_teacher_class.teacher_class_id = tbl_teacher_class_student.teacher_class_id 
                                    LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id 
                                    LEFT JOIN tbl_teacher ON tbl_teacher.teacher_id = tbl_teacher_class.teacher_id
                                    WHERE student_id = '$session_id' and school_year = '$school_year' AND tbl_class.isDeleted = false"
                                )) or die(mysqli_error());
                                $count = mysqli_num_rows($query);
                                ?>
                    <span class="badge badge-info"><?php echo $count; ?></span>
                </div>
                <div class="card-body">
                    <ul class="row">
                        <?php if ($count != '0') {
                                        while (
                                            $row = mysqli_fetch_array($query)
                                        ) {
                                            $id = $row['teacher_class_id']; ?>
                        <div style="border:1px solid black;margin-right:10px">
                            <center><a href="my_classmates.php<?php echo '?id=' . $id; ?>">
                                <img src="<?php echo $row['thumbnails']; ?>" width="124" height="100"
                                    class="img-thumbnail">
                            </a>
                            <p class="class"><?php echo $row['class_name']; ?></p></center>
                        </div>

                        <?php
                                    }
                                } else {
                            ?>
                        <div class="alert alert-primary">
                            <i class="fas fa-info-circle"></i>
                            You are currently not enrolled in a class
                        </div>
                        <?php
                            } ?>
                    </ul>
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>
</body>

</html>