<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Profile</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>
</head>

<body>
    <?php include 'homepage.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <?php
                                    $query = "SELECT * FROM tbl_student where student_id = '$session_id'";
                                    if($result = mysqli_query($conn, $query)) {
                                        $row = mysqli_fetch_assoc($result);
                            ?>
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img id="avatar" class="img-circle elevation-2"
                                        src="/lmstlee4/admin/uploads/<?php echo $row['location']; ?>" width="80"
                                        height="80">
                                </div>
                                <?php
                                    echo "<h3 class='profile-username text-center'>".$row['firstname']." ".$row['lastname'] . "</h3>";
                                    } 
                                    
                                ?>
                                <a href="change-avatar-student.php"><input type="submit" name="change"
                                        class="btn btn-outline-success btn-sm float-right mt-3"
                                        value="Edit Profile"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-primary">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills justify-content-between">
                                    <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">About
                                            me</a></li>
                                    <li type="submit" class="btn btn-success" data-toggle="modal"
                                        data-target="#update_profile-xl"><i class="fas fa-user"></i> Update Profile</li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <strong><i class="fas fa-book mr-1"></i>Gender</strong>
                                        <p class="text-muted"><?php echo $row['gender'];?></p>
                                        <hr>
                                        <strong><i class="fas fa-flag mr-1"></i>Birthday</strong>
                                        <p class="text-muted"><?php echo $row['birthdate'];?></p>
                                        <hr>
                                        <strong><i class="fas fa-book-open mr-1"></i>Address</strong>
                                        <p class="text-muted"><?php echo $row['address'];?></p>
                                        <hr>
                                        <strong><i class="fas fa-hands mr-1"></i>Phone Number</strong>
                                        <p class="text-muted"><?php echo $row['phone_no'];?></p>
                                        <hr>
                                        <strong><i class="fas fa-book-open mr-1"></i>Email</strong>
                                        <p class="text-muted"><?php echo $row['email'];?></p>
                                        <hr>
                                        <strong><i class="fas fa-book-open mr-1"></i>Age</strong>
                                        <p class="text-muted"><?php echo $row['age'];?></p>
                                        <hr>
                                        <strong><i class="fas fa-book-open mr-1"></i>Nationality</strong>
                                        <p class="text-muted"><?php echo $row['nationality'];?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="update_profile-xl" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content text-center ">
                <div class="modal-header bg-primary">
                    <h3 class="modal-title text-white "><b><i class="fas fa-user"></i> Update Profile</b></h3>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="student_id" value="<?php echo $row['student_id'];?>">
                                <label class="float-left font-15">First name</label>
                                <input type="text" name="firstname" value="<?php echo $row['firstname'];?>"
                                    class="form-control" required="">
                                <label class="float-left font-15">Last name</label>
                                <input type="text" name="lastname" value="<?php echo $row['lastname'];?>"
                                    class="form-control">
                                <label class="float-left font-15">Email</label>
                                <input type="email" name="email" value="<?php echo $row['email'];?>"
                                    class="form-control">
                                <label class="float-left font-15">Birthday</label>
                                <input type="date" name="birthdate" value="<?php echo $row['birthdate'];?>"
                                    class="form-control" max="9999-01-01" min="0000-01-01">
                                <label class="float-left font-15">Gender</label>
                                <select class="form-control" name="gender">
                                    <option><?php echo $row['gender'];?></option>
                                    <option>MALE</option>
                                    <option>FEMALE</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="float-left font-15">Age</label>
                                <input type="number" name="age" maxlength="2" min="15" max="25"
                                    value="<?php echo $row['age'];?>" class="form-control">
                                <label class="float-left font-15">Phone number</label>
                                <input type="number" name="phone_no" maxlength="11"
                                    value="<?php echo $row['phone_no'];?>" class="form-control">
                                <label class="float-left font-15">Address</label>
                                <textarea placeholder="Enter Address" name="address"
                                    class="form-control"><?php echo $row['address'];?></textarea>
                                <label class="float-left font-15">Nationality</label>
                                <input type="text" name="nationality" value="<?php echo $row['nationality'];?>"
                                    class="form-control">
                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php 
                    if (isset($_POST['update'])) {
                        $query = "UPDATE tbl_student SET firstname='$_POST[firstname]', lastname='$_POST[lastname]', email='$_POST[email]', birthdate='$_POST[birthdate]', gender='$_POST[gender]', age='$_POST[age]', phone_no='$_POST[phone_no]', address='$_POST[address]', nationality='$_POST[nationality]' WHERE student_id = '$session_id'";
                        $result = mysqli_query($conn, $query);
                    ?>
                    <script type="text/javascript">
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 100
                    });
                    toastr.success(
                        "Student Information Successfully Updated"
                    );
                    setTimeout(function() {
                        window.location = 'profile.php';
                    }, 1000);
                    </script>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>