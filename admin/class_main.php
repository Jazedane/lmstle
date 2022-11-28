<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Class</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>
</head>

<body id="class_div">
    <?php include 'index.php'; ?>
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
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $school_year_query_row['school_year']; ?></a></li>
                            <li class="breadcrumb-item active"><a href="#"><b>Class</b></a></li>

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
                                <h3 class="card-title">Class</h3>
                            </div>

                            <div class="card-body">
                                <ul class="row">
                                    <?php
                                        ($query = mysqli_query(
                                        $conn,
                                            "SELECT * FROM tbl_teacher_class 
                                            LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id and tbl_teacher_class.school_year_id 
                                            WHERE teacher_id = '$session_id' 
                                                AND tbl_class.isDeleted = false"
                                        )) or die(mysqli_error());
                                        $count = mysqli_num_rows($query);

                                        if ($count > 0) {
                                            while ($row = mysqli_fetch_array($query)) {
                                                $id = $row['teacher_class_id']; 
                                                $class_id = $row['class_id'];
                                                ?>

                                    <div class="card-deck">
                                        <div class="card bg-success mb-3" id="<?php echo $id; ?>"
                                            style="max-width:12rem;border:2px solid black;margin-right:20px">
                                            <a href=" my_students.php<?php echo '?id=' . $id; ?>">
                                                <img class="card-img-top" src="<?php echo $row['thumbnails']; ?>"
                                                    alt="Card image cap">
                                                <div class="card-body">
                                                    <center><p class="card-text"><b><?php echo $row['class_name']; ?></b></p></center>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <?php
                                            }
                                        } else {
                                    ?>
                                    <div class="alert alert-primary"><i class="fas fa-info-circle"></i> No Class
                                        Currently Added</div>
                                    <?php
                                        }
                                        ?>
                                </ul>
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