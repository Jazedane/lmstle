<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Class</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>
    <?php $get_id = $_GET['id']; ?>
</head>

<body>
    <?php include 'index.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Masterlist</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Class</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <form method="post">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-plus"></i> Edit Class</h3>
                                </div>
                                <?php
			                        $query = mysqli_query($conn,"select * from tbl_class where class_id = '$get_id'")or die(mysqli_error());
			                        $row = mysqli_fetch_array($query);
			                    ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Class Name</label>
                                        <input name="class_name" value="<?php echo $row['class_name']; ?>" type="text"
                                            class="form-control" placeholder="Enter Class Name"
                                            style="text-transform: uppercase" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <center><button name="update" type="submit" class="btn btn-success"
                                            href="class.php"><i class="fas fa-edit">
                                                </i> Edit</button>
                                        <a href="class.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i>
                                            Back </a>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                        if (isset($_POST['update'])){
                        $class_name = strtoupper($_POST['class_name']);

                        mysqli_query($conn,"update tbl_class set class_name = '$class_name' where class_id = '$get_id'")or die(mysqli_error());
                    ?>
                    <script type="text/javascript">
                    $(document).ready(function() {
                        var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 100
                        });
                        toastr.success(
                            "Class Successfully Updated"
                        );
                        setTimeout(function() {
                            window.location = "class.php";
                        }, 1000);
                    });
                    </script>
                    <?php
                    }
                    ?>
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Class List</h3>
                            </div>
                            <div class="card-body">
                                <form action="delete_class.php" method="post">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Year And Section</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
										$class_query = mysqli_query($conn,"select * from tbl_class where tbl_class.isDeleted=false")or die(mysqli_error());
										while($class_row = mysqli_fetch_array($class_query)){
										$id = $class_row['class_id'];
										?>

                                            <tr>
                                                <td><?php
                                                $class_name =
                                                    $class_row['class_name'];
                                                $class_name = strtoupper(
                                                    $class_name
                                                );
                                                echo $class_name;
                                                ?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
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