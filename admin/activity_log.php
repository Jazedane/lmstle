<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Activity Log</title>

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
                            <li class="breadcrumb-item active">Activity Log</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Activity Log</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="display table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th>Date</th>
                                    <th>User</th>
                                    <th>Action</th>

                                </tr>

                            </thead>
                            <tbody>

                                <?php
										$query = mysqli_query($conn,"SELECT * FROM tbl_activity_log ORDER BY date DESC")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
									?>

                                <tr>

                                    <td data-order=<fmt:formatDate pattern="F d, Y h:i A"><?php $date = date_create($row['date']);
                                                    echo date_format(
                                                    $date,
                                                    'F d, Y h:i A'
                                                    ); ?>
                                    </td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['action']; ?></td>
                                </tr>

                                <?php } ?>

                            </tbody>
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
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
    </script>
</body>

</html>