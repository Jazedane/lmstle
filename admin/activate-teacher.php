<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Teacher</title>

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
                        <h1>Masterlist</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Teacher</li>
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
                                <h3 class="card-title" style="margin-top:10px">Activated Teacher List</h3>
                                <a data-toggle="modal" href="#teacher_add" class="btn btn-success float-right"
                                    name="add_student"><i class="fas fa-user-plus lg"></i> Add</a>
                            </div>
                            <div class="card-body">
                                <form id="delete_teacher" method="post">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <ul data-toggle="modal" href="#teacher_delete" id="delete"
                                            class="btn btn-danger" name="delete_teacher"><i class="fas fa-trash"></i>
                                            Remove
                                        </ul>
                                        <?php include 'modal_delete.php'; ?>
                                        <div class="float-right">
                                            <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                    <button type="button" class="btn btn-success dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fas fa-users"></i> Activated
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                        <a href="teacher.php" class="dropdown-item" type="button">
                                                            Show All</a>
                                                        <a href="activate-teacher.php" class="dropdown-item active"
                                                            type="button">
                                                            Activated</a>
                                                        <a href="deactivate-teacher.php" class="dropdown-item"
                                                            type="button">
                                                            Deactivated</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" name="selectAll" id="checkAll" />
                                                    <script>
                                                    $("#checkAll").click(function() {
                                                        $('input:checkbox').not(this).prop('checked', this
                                                            .checked);
                                                    });
                                                    </script>
                                                </th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Gender</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            ($teacher_query = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbl_teacher WHERE tbl_teacher.teacher_stat = 'Activated' AND isDeleted=false"
                                            )) or die(mysqli_error());
                                            while (
                                                $row = mysqli_fetch_array(
                                                    $teacher_query
                                                )
                                            ) {
                                                $id = $row['teacher_id']; ?>

                                            <tr>
                                                <td width="30">
                                                    <input id="checkAll" class="uniform_on" name="selector[]"
                                                        type="checkbox" value="<?php echo $id; ?>">
                                                </td>
                                                <td><?php
                                                $firstname = $row['firstname'];
                                                $lastname = $row['lastname'];
                                                $firstname = strtoupper(
                                                    $firstname
                                                );
                                                $lastname = strtoupper(
                                                    $lastname
                                                );
                                                echo $lastname .
                                                    ', ' .
                                                    $firstname;
                                                ?></td>
                                                <td><?php
                                                $username = $row['username'];
                                                $username = strtoupper(
                                                    $username
                                                );
                                                echo $username;
                                                ?></td>
                                                <td><?php
                                                $gender = $row['gender'];
                                                $gender = strtoupper(
                                                    $gender);
                                                echo $gender;
                                                ?></td>
                                                <td><?php
                            					if($row['teacher_stat'] =='ACTIVATED') {
                              						echo "<span class='badge badge-success'>ACTIVATED</span>";
                            					}elseif($row['teacher_stat'] =='DEACTIVATED'){
                              						echo "<span class='badge badge-danger'>DEACTIVATED</span>";
                                                } ?></td>
                                                <td width="60">
                                                    <a href="edit_teacher.php<?php echo '?id=' .$id; ?>"
                                                        class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                </td>
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
        <div class="modal hide fade" id="teacher_add" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h4 id="myModalLabel" class="modal-title"><i class="fas fa-user-plus"></i> Add Teacher</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data">
                                <label>First Name</label>
                                <input type="text" name="firstname" class="form-control" placeholder="Enter Firstname"
                                    style="text-transform: uppercase" required>
                                <label>Last Name</label>
                                <input type="text" name="lastname" class="form-control" placeholder="Enter Lastname"
                                    style="text-transform: uppercase" required>
                                <label>Gender</label>
                                <select name="gender" class="form-control" placeholder="Gender" required>
                                    <option selected disabled hidden>SELECT GENDER</option>
                                    <option>MALE</option>
                                    <option>FEMALE</option>
                                </select>
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="ENTER USERNAME"
                                    required>
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="ENTER PASSWORD"
                                    required>
                                <div class="modal-footer">
                                    <center><button name="save" type="submit" class="btn btn-success"><i
                                                class="fas fa-plus">
                                            </i> Add</button></center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <?php
        if (isset($_POST['save'])){
        $firstname = strtoupper($_POST['firstname']);
        $lastname = strtoupper($_POST['lastname']);
        $gender = $_POST['gender'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashedPassword = hash('sha256',$password);

        $query = mysqli_query($conn,"select * from tbl_teacher where username = '$username'")or die(mysqli_error());
        $count = mysqli_num_rows($query);

        if ($count > 0){ ?>
    <script>
    toastr.warning("Warning", "Teacher Already Exist");
    </script>
    <?php
        }else {
        mysqli_query($conn,"INSERT INTO tbl_teacher (username,password,firstname,lastname,gender,location,teacher_stat) 
        values('$username','$hashedPassword','$firstname','$lastname','$gender','NO-IMAGE-AVAILABLE.jpg','Activated')")or die(mysqli_error());
        mysqli_query($conn,"INSERT INTO tbl_activity_log (date,username,action) 
        values(NOW(),'$username','Add User $username')")or die(mysqli_error());
    ?>
    <script>
    toastr.success("Success", "Teacher Successfully Added!")
    window.location.reload();
    </script>
    <?php
    }
    }
    ?>
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
    <script type="text/javascript">
    $(document).ready(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000
        });
        $('.delete_teacher').click(function() {
            var selectedIds = $('[name="selector[]"]:checked').map((_,
                element) => {
                return $(element).val()
            }).get()

            $.ajax({
                type: "POST",
                url: "delete_teacher.php",
                data: ({
                    selector: selectedIds,
                    delete_teacher: true
                }),
                success: function(html) {
                    toastr.error("Deleted",
                        "Teacher Successfully Deleted"
                    );
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            });
            return false;
        });
    });
    </script>
</body>

</html>