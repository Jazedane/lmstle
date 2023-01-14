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
    <?php include 'index.php'; ?>
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
                                    $query = "SELECT * FROM tbl_teacher where teacher_id = '$session_id'";
                                    if($result = mysqli_query($conn, $query)) {
                                        $row = mysqli_fetch_assoc($result);
                            ?>
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img id="avatar" class="img-circle  elevation-2"
                                        src="/lmstlee4/admin/uploads/<?php echo $row['location']; ?>" width="80"
                                        height="80">
                                </div>
                                <?php
                                    echo "<h3 class='profile-username text-center'>".$row['firstname']." ".$row['lastname'] . "</h3>";
                                    } 
                                    
                                ?>
                                <a data-toggle="modal" href="#change-avatar" class="btn btn-success float-right"
                                    name="change"><i class="fas fa-user lg"></i> Edit Profile</a>
                            </div>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Introduction</h3>
                            </div>
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i>Birthday</strong>
                                <p class="text-muted"><?php $birthdate = date_create($row['birthdate']); 
                                echo date_format($birthdate,'F d, Y'); ?></p>
                                <hr>
                                <strong><i class="fas fa-venus-mars mr-1"></i>Gender</strong>
                                <p class="text-muted"><?php echo $row['gender'];?></p>
                                <hr>
                                <strong><i class="fas fa-building mr-1"></i>Department</strong>
                                <p class="text-muted"><?php echo $row['department'];?></p>
                                <hr>
                                <strong><i class="fas fa-envelope mr-1"></i>Email</strong>
                                <p class="text-muted"><?php echo $row['email'];?></p>
                                <hr>
                                <strong><i class="fas fa-phone-volume mr-1"></i>Phone Number</strong>
                                <p class="text-muted"><?php echo $row['phone_no'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title" style="margin-top:10px">About Me</h3>
                                <a type="submit" class="btn btn-success float-right" data-toggle="modal"
                                    data-target="#update_profile-xl"><i class="fas fa-user"></i> Update Profile</a>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <strong><i class="fas fa-book mr-1"></i>Address</strong>
                                        <p class="text-muted"><?php echo $row['address'];?></p>
                                        <hr>
                                        <strong><i class="fas fa-flag mr-1"></i>Nationality</strong>
                                        <p class="text-muted"><?php echo $row['nationality'];?></p>
                                        <hr>
                                        <strong><i class="fas fa-book-open mr-1"></i>Educational Background</strong>
                                        <p class="text-muted"><?php echo $row['education'];?></p>
                                        <hr>
                                        <strong><i class="fas fa-hands mr-1"></i>Skills</strong>
                                        <p class="text-muted"><?php echo $row['skills'];?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                                    <input type="hidden" name="teacher_id" value="<?php echo $row['teacher_id'];?>">
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
                                    <label class="float-left font-15">Department</label>
                                    <input type="text" name="department" value="<?php echo $row['department'];?>"
                                        class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="float-left font-15">Phone number</label>
                                    <input type="number" name="phone_no"
                                        oninput="this.value = this.value.slice(0, this.dataset.maxlength);"
                                        min="9000000000" data-maxlength="11" max="10000000000"
                                        value="<?php echo $row['phone_no'];?>" class="form-control">
                                    <label class="float-left font-15">Address</label>
                                    <textarea placeholder="Enter Address" name="address"
                                        class="form-control"><?php echo $row['address'];?></textarea>
                                    <label class="float-left font-15">Nationality</label>
                                    <input type="text" name="nationality" value="<?php echo $row['nationality'];?>"
                                        class="form-control">
                                    <label class="float-left font-15">Educational Background</label>
                                    <textarea placeholder="Enter Educational Background" name="education"
                                        class="form-control"><?php echo $row['education'];?></textarea>
                                    <label class="float-left font-15">Skills</label>
                                    <textarea placeholder="Enter Skills" name="skills"
                                        class="form-control"><?php echo $row['skills'];?></textarea>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit" name="update">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php 
                            if (isset($_POST['update'])) {
                                $query = "UPDATE tbl_teacher SET firstname='$_POST[firstname]', lastname='$_POST[lastname]', email='$_POST[email]', 
                                birthdate='$_POST[birthdate]', gender='$_POST[gender]', department='$_POST[department]', phone_no='$_POST[phone_no]', 
                                address='$_POST[address]', nationality='$_POST[nationality]', education='$_POST[education]', skills='$_POST[skills]' 
                                WHERE teacher_id = '$session_id'";
                                $result = mysqli_query($conn, $query);
                        ?>
                        <script type="text/javascript">
                        var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 100
                        });
                        toastr.success("Success",
                            "Teacher Information Successfully Updated"
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
        <div class="modal hide fade" id="change-avatar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h4 id="myModalLabel" class="modal-title"><i class="fas fa-user"></i> Change Profile
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <center>
                                            <div class="custom-file">
                                                <label for="formFileMultiple" class="form-label">
                                                    <input name="image" class="custom-file input" id="formFileMultiple"
                                                        type="file" onchange="displayImg(this,$(this))"
                                                        required></input>
                                        </center>
                                    </div>
                                    <div class="form-group d-flex justify-content-center">
                                        <img src="/lmstlee4/admin/uploads/<?php echo $row ['location'];  ?>" alt=""
                                            id="cimg" class="img-fluid img-thumbnail">
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
        </div>
        <?php if (isset($_POST['change'])) {
                               
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_name = addslashes($_FILES['image']['name']);
            $image_size = getimagesize($_FILES['image']['tmp_name']);

            $filePath = $_SERVER['DOCUMENT_ROOT'] . "/lmstlee4/admin/uploads/";

            move_uploaded_file($_FILES["image"]["tmp_name"], $filePath . $_FILES["image"]["name"]);
            $location = $_FILES["image"]["name"];
								
	        mysqli_query($conn,"update tbl_teacher set location = '$location' where teacher_id  = '$session_id' ")
            or die(mysqli_error());
        ?>
        <script>
        jQuery(document).ready(function($) {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 100
            });
            toastr.success("Success", "Teacher Avatar Successfully Change!");
            setTimeout(function() {
                window.location = 'profile.php';
            }, 1000);
        });
        </script>
        <?php } ?>
    </div>
    <?php include 'footer.php'; ?>
    <style>
    img#cimg {
        height: 15vh;
        width: 15vh;
        object-fit: cover;
        border-radius: 100% 100%;
    }
    </style>
    <script>
    function displayImg(input, _this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#cimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</body>

</html>