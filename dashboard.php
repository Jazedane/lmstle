<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Dashboard</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
</head>

<body>
    <?php include 'homepage.php'; ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <?php
                                ($query = mysqli_query(
                                    $conn,
                                    "SELECT * FROM tbl_teacher_class_student
                                    LEFT JOIN tbl_teacher_class ON tbl_teacher_class.teacher_class_id = tbl_teacher_class_student.teacher_class_id 
                                    LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id 
                                    LEFT JOIN tbl_school_year ON tbl_school_year.school_year_id = tbl_teacher_class.school_year_id
                                    LEFT JOIN tbl_teacher ON tbl_teacher.teacher_id = tbl_teacher_class.teacher_id
                                    WHERE student_id = '$session_id' and tbl_class.isDeleted = false"
                                )) or die(mysqli_error());
                                $count = mysqli_num_rows($query);
                                ?>
                    <div class="col-lg-6 col-6">
                        <div class="small-box bg-success">
                            <?php if ($count != '0') {
                                        while (
                                            $row = mysqli_fetch_array($query)
                                        ) {
                                            $id = $row['teacher_class_id']; ?>
                            <div class="inner">
                                <h3><b><?php echo $row['class_name']; ?></b></p>
                                <p><b><?php echo $row['school_year']; ?></b></p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-school"></i>
                            </div>
                            <?php
                                    }
                                } else {
                            ?>
                            <div class="inner">
                                <h3><?php echo $count; ?></h3>
                                <p>You are currently not enrolled in a class</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <?php
                            } ?>
                        </div>
                    </div>
                    
                    <?php
                    ($query = mysqli_query(
                        $conn,
                        'select * from tbl_task where isDeleted=false'
                        )) or die(mysqli_error());
                        $count = mysqli_num_rows($query);
                    ?>
                    <div class="col-lg-6 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo $count; ?></h3>
                                <p>Tasks</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-list"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>
</body>

</html>