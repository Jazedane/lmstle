<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Teacher Log</title>

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
                        <h1>Log History</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Teacher Log</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Teacher Log</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Date Login</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <?php 
                            $query= mysqli_query($conn,"SELECT * FROM tbl_teacher WHERE teacher_id = '$session_id'")or die(mysqli_error());
				            $row = mysqli_fetch_array($query);
                            $is_superadmin = $row['is_superadmin'];

                            if ($is_superadmin == true) { ?>
                            <tbody>
                                <?php
									$teacher_query = mysqli_query($conn,"SELECT * FROM tbl_teacher_log ORDER BY login_date DESC ")or die(mysqli_error());
									while($row = mysqli_fetch_array($teacher_query)){
									$id = $row['teacher_log_id'];
								?>

                                <tr>
                                    <td data-order=<fmt:formatDate pattern="F d, Y h:i A"><?php $login_date = date_create($row['login_date']);
                                                    echo date_format(
                                                    $login_date,
                                                    'F d, Y h:i A'
                                                    ); ?>
                                    </td>
                                    <td><?php echo $row['username']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <?php
                            }
                            ?>
                            <?php 
                            $query= mysqli_query($conn,"SELECT * FROM tbl_teacher WHERE teacher_id = '$session_id'")or die(mysqli_error());
				            $row = mysqli_fetch_array($query);
                            $is_superadmin = $row['is_superadmin'];

                            if ($is_superadmin == false) { ?>
                            <tbody>
                                <?php
									$teacher_query = mysqli_query($conn,"SELECT * FROM tbl_teacher_log WHERE teacher_id = '$session_id' ORDER BY login_date DESC ")or die(mysqli_error());
									while($row = mysqli_fetch_array($teacher_query)){
									$id = $row['teacher_log_id'];
								?>

                                <tr>
                                    <td data-order=<fmt:formatDate pattern="F d, Y h:i A"><?php $login_date = date_create($row['login_date']);
                                                    echo date_format(
                                                    $login_date,
                                                    'F d, Y h:i A'
                                                    ); ?>
                                    </td>
                                    <td><?php echo $row['username']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $(document).ready(function() {
        $('.dataTables_filter input[type="search"]').css({
            'width': '220px',
            'display': 'inline-block'
        });
    });
    </script>
</body>

</html>