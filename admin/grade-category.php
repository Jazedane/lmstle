<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Grade Category</title>

    <?php include 'header.php'; 
        include 'session.php';
        include 'script.php';
     $get_id = $_GET['id']; 
     $task_total_percentage = [];
     $grade_impact = [];
     ?>
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
                                LEFT JOIN tbl_school_year ON tbl_school_year.school_year_id = tbl_teacher_class.school_year_id
							    WHERE teacher_class_id = '$get_id'"
                            )) or die(mysqli_error());
                            $class_row = mysqli_fetch_array($class_query);
                            $class_id = $class_row['class_id'];
                            ?>

                            <li class="breadcrumb-item"><a href="#"><?php echo $class_row[
                                'class_name'
                            ]; ?></a> <span class="divider"></span></li>
                            <li class="breadcrumb-item"><a href="#">School Year:
                                    <?php echo $class_row[
                                        'school_year'
                                    ]; ?></a> <span class="divider"></span></li>
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
                                <p>Grade categories must add up to 60% for performance task.</p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Grade Category</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Percentage</label>
                                        </div>
                                    </div>
                                </div>

                                <?php 
                                ($grade_category_query = mysqli_query(
                                    $conn,
                                    "SELECT * FROM tbl_grade_category
                                    LEFT JOIN tbl_class ON tbl_class.class_id = tbl_grade_category.class_id
                                    WHERE tbl_grade_category.class_id = '$class_id'"
                                )) or die(mysqli_error());

                                while (
                                    $grade_category_row = mysqli_fetch_array(
                                        $grade_category_query
                                    )
                                ) {

                                if (!isset($grade_impact[$grade_category_row['category_name']])) {
                                                    /**
                                                     * Null checking. Make sure that the array key is initialized.
                                                     */
                                                    $grade_impact[
                                                        $grade_category_row[
                                                            'category_name'
                                                        ]
                                                    ] = 0;
                                                }

                                                $grade_impact[$grade_category_row['category_name']] = $grade_category_row['impact_percentage'];
                                ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php echo $grade_category_row['category_name'];?>
                                    </div>
                                    <div class="col-md-3">
                                        <?php
                                                    /**
                                                     * Record the total points of each activity.
                                                     */
                                                    if (isset($task_total_percentage[$grade_category_row['category_name']])) {
                                                        $task_total_percentage[$grade_category_row['category_name']] += $grade_category_row['impact_percentage'];
                                                    } else {
                                                        /**
                                                         * Null checking. Make sure that the array key is initialized.
                                                         */
                                                        $task_total_percentage[$grade_category_row['category_name']] = $grade_category_row['impact_percentage'];
                                                    }

                                                    echo $grade_category_row[
                                                        'impact_percentage'
                                                    ]; 
                                            ?> %
                                    </div>
                                    <div class="col-md-3">
                                        <a data-toggle="modal"
                                            data-target="#delete<?php echo $grade_category_row['grade_category_id'];?>"
                                            id="delete" name=""><i class="fas fa-trash"></i></a>
                                        <?php include 'delete-grade-category-modal.php'; ?>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Remaining Percentage:
                                            <?php
                                                    /**
                                                     * Student's overall grade.
                                                     */
                                                    $impact_percentage_total = 0;
                                                        /**
                                                         * Get the student's grade for each category.
                                                         */
                                                    foreach (
                                                        $grade_impact
                                                        as $key => $grade_impact_value
                                                    ) {
                                                        
                                                        $value = 0;
                                                        if (isset($grade_impact[$key])) {
                                                            $value = $grade_impact[$key];
                                                        }
                                                        
                                                        /**
                                                         * Sum up the overall student's grade.
                                                         */
                                                        $impact_percentage_total += $value;
                                                    }

                                                echo 100-$impact_percentage_total . "%"?></p>
                                    </div>
                                </div>
                                <form class="mt-5" action="category.php" method="post" enctype="multipart/form-data"
                                    name="upload">
                                    <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                                    <input type="hidden" name="get_id" value="<?php echo $get_id; ?>">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="category_name" class="form-control"
                                                    placeholder="Enter new grade category name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="number" name="impact_percentage" maxlength="2" max="<?php echo 100-$impact_percentage_total; ?>"
                                                    class="form-control" placeholder="Enter percentage" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <center>
                                            <button class="btn btn-success" type="submit">Add Grade Category</button>
                                            <input type="reset" class="btn btn-danger " id="reset" name="reset"
                                                value="Cancel">
                                        </center>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>