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
    <?php include 'index.php'; ?>
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
                <?php 
                $query= mysqli_query($conn,"SELECT * FROM tbl_teacher WHERE teacher_id = '$session_id'")or die(mysqli_error());
				$row = mysqli_fetch_array($query);
                $is_superadmin = $row['is_superadmin'];

                if ($is_superadmin == true) { ?>
                <div class="row">
                    <?php
                        ($query_teacher = mysqli_query(
                        $conn,
                        'select * from tbl_teacher where isDeleted=false'
                        )) or die(mysqli_error());
                        $count_teacher = mysqli_num_rows($query_teacher);
                    ?>
                    <div class="col-lg-6 col-6">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3><?php echo $count_teacher; ?></h3>
                                <p>Teachers</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-stalker"></i>
                            </div>
                        </div>
                    </div>
                    <?php
                        ($query_student = mysqli_query(
                        $conn,
                        'select * from tbl_student where isDeleted=false'
                        )) or die(mysqli_error());
                        $count_student = mysqli_num_rows($query_student);
                    ?>
                    <div class="col-lg-6 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $count_student; ?></h3>
                                <p>Students</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <?php
                        ($query_class = mysqli_query(
                        $conn,
                        'select * from tbl_class where isDeleted=false'
                        )) or die(mysqli_error());
                        $count_class = mysqli_num_rows($query_class);
                    ?>
                    <div class="col-lg-6 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo $count_class; ?></h3>
                                <p>Class</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-book"></i>
                            </div>
                        </div>
                    </div>
                    <?php
                        ($query_task = mysqli_query(
                        $conn,
                        'select * from tbl_task where isDeleted=false'
                        )) or die(mysqli_error());
                        $count_task = mysqli_num_rows($query_task);
                    ?>
                    <div class="col-lg-6 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo $count_task; ?></h3>
                                <p>Tasks</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-document-text"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
                <?php 
                $query= mysqli_query($conn,"SELECT * FROM tbl_teacher WHERE teacher_id = '$session_id'")or die(mysqli_error());
				$row = mysqli_fetch_array($query);
                $is_superadmin = $row['is_superadmin'];

                if ($is_superadmin == false) { ?>
                <div class="row">
                    <?php
                        ($query_student = mysqli_query(
                        $conn,
                        "SELECT * FROM tbl_teacher_class_student
                        LEFT JOIN tbl_student ON tbl_student.student_id = tbl_teacher_class_student.student_id
                        INNER JOIN tbl_class ON tbl_class.class_id = tbl_student.class_id 
                        WHERE teacher_id = '$session_id'"
                        )) or die(mysqli_error());
                        $count_student = mysqli_num_rows($query_student);
                    ?>
                    <div class="col-lg-6 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $count_student; ?></h3>
                                <p>Students</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <?php
                        ($query_class = mysqli_query(
                        $conn,
                        "SELECT * FROM tbl_teacher_class 
                        INNER JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id and tbl_teacher_class.school_year_id 
                        WHERE teacher_id = '$session_id' 
                        AND tbl_class.isDeleted = false"
                        )) or die(mysqli_error());
                        $count_class = mysqli_num_rows($query_class);
                    ?>
                    <div class="col-lg-6 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo $count_class; ?></h3>
                                <p>Class</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-book"></i>
                            </div>
                        </div>
                    </div>
                    <?php
                        ($query_task = mysqli_query(
                        $conn,
                        "SELECT * FROM tbl_task 
                        LEFT JOIN tbl_grade_category ON tbl_grade_category.grade_category_id = tbl_task.grade_category_id
                        WHERE tbl_task.class_id = '$session_id' AND isDeleted=false"
                        )) or die(mysqli_error());
                        $count_task = mysqli_num_rows($query_task);
                    ?>
                    <div class="col-lg-6 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo $count_task; ?></h3>
                                <p>Tasks</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-document-text"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>
</body>

</html>