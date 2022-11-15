<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Grade Category</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>
</head>

<body>
    <?php include 'index.php'; ?>
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
                                    "SELECT * FROM tbl_grade_category"
                                )) or die(mysqli_error());

                                while (
                                    $grade_category_row = mysqli_fetch_array(
                                        $grade_category_query
                                    )
                                ) {

                                    $category_name =
                                        $grade_category_row['category_name'];
                                    $impact_percentage =
                                        $grade_category_row[
                                            'impact_percentage'
                                        ];
                                    ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <?php echo $category_name; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo $impact_percentage; ?>%
                                    </div>
                                </div>

                                <?php
                                    }
                                ?>
                                <form class="mt-5" action="main-category.php" method="post"
                                    enctype="multipart/form-data" name="upload">
                                    <input type="hidden" name="id" value="<?php echo $session_id; ?>">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="category_name" class="form-control"
                                                    placeholder="Enter new grade category name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="number" name="impact_percentage" maxlenth="2" max="100"
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