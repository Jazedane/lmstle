<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Change Avatar</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
</head>

<body>
    <?php include 'index.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Change Avatar</h1>
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
                            <li class="breadcrumb-item active"><a href="#"><b>Change Avatar</b></a></li>

                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Change Avatar</h3>
                            </div>
                            <?php
								$query = mysqli_query($conn,"select * from tbl_teacher where teacher_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								?>
                            <form method="post" action="teacher-avatar.php" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputCurrentPassword">Current Password</label>
                                        <center>
                                            <div class="mb-3">
                                                <label for="formFileMultiple" class="form-label">
                                                    <input name="image" class="form-control" id="formFileMultiple"
                                                        type="file" required></input>
                                        </center>
                                    </div>
                                    <div class="card-footer">
                                        <center><button type="submit" name="change"
                                                class="btn btn-success">Change</button>
                                        </center>
                                    </div>
                                </div>
                            </form>
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