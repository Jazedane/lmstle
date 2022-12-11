<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Change Profile Picture</title>

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
                        <h1>Change Profile Picture</h1>
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
                            <li class="breadcrumb-item active"><a href="#"><b>Change Profile Picture</b></a></li>

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
                                <h3 class="card-title">Change Profile Picture</h3>
                                <div id="" class="float-right"><a href="profile.php">
                                        <i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                            <?php
								$query = mysqli_query($conn,"select * from tbl_teacher where teacher_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								?>
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
                                toastr.success("Teacher Avatar Successfully Change!");
                                setTimeout(function() {
                                    window.location = 'profile.php';
                                }, 1000);
                            });
                            </script>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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