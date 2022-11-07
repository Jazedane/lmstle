<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Grade Category</title>

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
                        <h1>Tasks</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <?php
                                ($class_query = mysqli_query(
                                $conn,
                                "SELECT * FROM tbl_teacher_class
							    LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id
							    WHERE teacher_class_id = '$get_id'"
                                )) or die(mysqli_error());
                                $class_row = mysqli_fetch_array($class_query);
                                $class_id = $class_row['class_id'];
                        ?>

                            <li class="breadcrumb-item"><a href="#"><?php echo $class_row['class_name']; ?></a> <span
                                    class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $class_row['school_year']; ?></a> <span class="divider"></span></li>
                            <li class="breadcrumb-item active"><a href="#"><b>Grade Category</b></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Grade Category</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <h4>Grade Categories</h4><br>
                                <p>Grade categories must add up to 70% for performance task.</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Grade Category</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter name"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Grade Category</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter name"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Percentage</label>
                                            <input type="number" name="percentage" maxlenth="3" max=""
                                                class="form-control" placeholder="Enter percentage" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Percentage</label>
                                            <input type="number" name="percentage" maxlenth="3" max=""
                                                class="form-control" placeholder="Enter percentage" required>
                                        </div>
                                    </div>
                                </div>
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