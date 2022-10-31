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
                        ($query_teacher = mysqli_query(
                        $conn,
                        'select * from tbl_teacher'
                        )) or die(mysqli_error());
                        $count_teacher = mysqli_num_rows($query_teacher);
                    ?>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3><?php echo $count_teacher; ?></h3>
                                <p>Teachers</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <?php
                        ($query_student = mysqli_query(
                        $conn,
                        'select * from tbl_student'
                        )) or die(mysqli_error());
                        $count_student = mysqli_num_rows($query_student);
                    ?>
                    <div class="col-lg-3 col-6">
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
                    <div class="col-lg-3 col-6">
                        <?php
                                        ($query_student = mysqli_query(
                                        $conn,
                                        "select * from tbl_student where status='Registered'"
                                        )) or die(mysqli_error());
                                        $count_student = mysqli_num_rows($query_student);
                                        ?>
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo $count_student; ?></h3>

                                <p>Registered Students</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <?php
                                        ($query_student = mysqli_query(
                                        $conn,
                                        "select * from tbl_student where status='Unregistered'"
                                        )) or die(mysqli_error());
                                        $count_student = mysqli_num_rows($query_student);
                                        ?>
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo $count_student; ?></h3>

                                <p>Unregistered Students</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <?php
                        ($query_task = mysqli_query(
                        $conn,
                        'select * from tbl_task'
                        )) or die(mysqli_error());
                        $count_task = mysqli_num_rows($query_task);
                    ?>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo $count_task; ?></h3>
                                <p>Tasks</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    Datatable
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <?php
                                        ($query_student = mysqli_query(
                                        $conn,
                                        'select * from tbl_student'
                                        )) or die(mysqli_error());
                                        $count_student = mysqli_num_rows($query_student);
                                    ?>
                                    <div class="col-6 col-md-3 text-center">
                                        <div type="text" class="knob" value="30"
                                            data-percent="<?php echo $count_student; ?>" data-min="0" data-max="100"
                                            data-width="150" data-height="150" data-fgColor="#3c8dbc">
                                            <?php echo $count_student; ?></div>

                                        <div class="knob-label">Students</div>
                                    </div>

                                    <?php
                                        ($query_student = mysqli_query(
                                        $conn,
                                        "select * from tbl_student where status='Registered'"
                                        )) or die(mysqli_error());
                                        $count_student = mysqli_num_rows($query_student);
                                    ?>
                                    <div class="col-6 col-md-3 text-center">
                                        <div type="text" class="knob" value="70"
                                            data-percent="<?php echo $count_student; ?> data-min=" 0" data-max="100"
                                            data-width="150" data-height="150" data-fgColor="#f56954">
                                            <?php echo $count_student; ?></div>

                                        <div class="knob-label">Registered Students</div>
                                    </div>
                                    <?php
                                        ($query_class = mysqli_query($conn, 'select * from tbl_class')) or
                                        die(mysqli_error());
                                        $count_class = mysqli_num_rows($query_class);
                                    ?>
                                    <div class="col-6 col-md-3 text-center">
                                        <div type="text" class="knob" value="1"
                                            data-percent="<?php echo $count_class; ?> data-min=" 0" data-max="100"
                                            data-width="150" data-height="150" data-fgColor="#00a65a">
                                            <?php echo $count_class; ?></div>

                                        <div class="knob-label">Unregistered Students</div>
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
    <?php include 'script.php'; ?>
</body>

</html>