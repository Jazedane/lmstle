<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Notification</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
</head>

<body>
    <?php include 'homepage.php'; ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Notification</h1>
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
                            <li class="breadcrumb-item active">School Year: <?php echo $school_year_query_row[
                            'school_year'
                        ]; ?></a></li>
                            <li class="breadcrumb-item active">Notification</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> New Notifications </h3>
                            </div>

                            <div class="card-body">
                                <form action="read.php" method="post">

                                    <div>
                                        <button id="delete" class="btn btn-success" name="read"><i
                                                class="fas fa-check"></i> Mark as Read</button>

                                        <div style="margin-bottom: 10px;">
                                            <input type="checkbox" name="selectAll" id="checkAll" /> Select All
                                        </div>

                                        <script>
                                        $("#checkAll").click(function() {
                                            $('input:checkbox').not(this).prop('checked', this.checked);
                                        });
                                        </script>
                                    </div>

                                    <?php
                                    ($query = mysqli_query(
                                        $conn,
                                        "SELECT * FROM tbl_notification 
                                        LEFT JOIN tbl_student ON broadcaster_id=tbl_student.student_id
                                        LEFT JOIN tbl_class ON tbl_class.class_id=tbl_student.class_id
                                        WHERE receiver_id = '$session_id' AND is_read = false"
                                    )) or die(mysqli_error($conn));

                                    $count = mysqli_num_rows($query);
                                    if ($count > 0) {
                                        while (
                                            $row = mysqli_fetch_array($query)
                                        ) {

                                            $get_id = $row['broadcaster_id'];
                                            $id = $row['notification_id'];
                                            $is_read = $row['is_read'];

                                    ?>

                                    <div class="post" id="del<?php echo $id; ?>">
                                        <?php if ($is_read == true) {
                                        } else {
                                             ?>
                                        <input id="checkAll" class="" name="selector[]" type="checkbox"
                                            value="<?php echo $id; ?>">
                                        <?php
                                        } ?>

                                        <strong><?php echo $row['firstname'] .
                                            ' ' .
                                            $row['lastname']; ?></strong>

                                        <?php echo $row['message']; ?> 
                                        <a class="btn-link" href="<?php echo $row[
                                            'link'
                                        ]; ?>">
                                            <?php echo $row['class_name']; ?>
                                        </a>

                                        <div class=""><b>Notification date: </b>
                                            <?php
                                        $date = date_create($row['date']);
                                        echo date_format(
                                            $date,
                                            'M/d/Y h:i:s a'
                                        );
                                        ?>
                                        </div>
                                    </div>

                                    <?php
                                        }
                                    } else {
                                         ?>
                                    <div class="alert alert-info"><strong><i class="fas fa-bell"></i> No
                                            Notifications Found</strong></div>
                                    <?php
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Notification History</h3>
                            </div>

                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Notification</th>
                                            <th>Notification Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         ($query = mysqli_query(
                                            $conn,
                                        "SELECT * FROM tbl_notification 
                                            LEFT JOIN tbl_teacher ON broadcaster_id=tbl_teacher.teacher_id
                                            WHERE receiver_id = '$session_id' AND is_read = true"
                                        )) or die(mysqli_error());
                                        $count = mysqli_num_rows($query);
                                            if ($count > 0) {
                                                while ($row = mysqli_fetch_array($query)) {

                                            $get_id = $row['broadcaster_id'];
                                            $id = $row['notification_id'];
                                            $is_read = $row['is_read'];
                                        ?>

                                        <tr>
                                            <td><strong><?php echo $row['firstname'] .
                                                ' ' .
                                                $row['lastname']; ?></strong>

                                                <a class="btn-link" href="<?php echo $row[
                                                'link'
                                                ]; ?>">
                                                    <?php echo $row['message']; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php
                                                $date = date_create($row['date']);
                                                echo date_format(
                                                $date,
                                                'M/d/Y h:i:s a'
                                                );
                                                ?>
                                            </td>
                                        </tr>

                                        <?php
                                        }
                                        } else {
                                        ?>
                                        <div class="alert alert-info"><strong><i class="fa-solid fa-info-circle"></i> No
                                                Notifications Found</strong></div>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>

    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>
</body>

</html>