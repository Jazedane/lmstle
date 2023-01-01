<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Gallery</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
    <?php include 'script.php'; ?>
</head>

<body>
    <?php include 'index.php'; ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Plant Gallery</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Gallery</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        error_reporting(0);
        $msg = "";

        $targetDir = "./uploads/";
        $plant_name = $_POST['plant_name'];
        $description = $_POST["description"];
        $fileName = $_FILES["uploadfile"]["name"];
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (isset($_POST['upload'])  && !empty($_FILES["uploadfile"]["name"])) {

        $query = mysqli_query(
                $conn,
                "SELECT * FROM image WHERE plant_name  =  '$plant_name' "
                ) or die(mysqli_error());
                $count = mysqli_num_rows($query);

        if ($count > 0) { ?>
        <script>
        toastr.warning("Plant Already Exists!");
        setTimeout(function() {
            window.location = 'gallery.php?current_page=1';
        }, 1000);
        </script>
        <?php } else {

      // Get all the submitted data from the form
      $sql = "INSERT INTO image (filename, plant_name, description) VALUES ('$fileName', '$plant_name', '$description')";

      // Execute query
      mysqli_query($conn, $sql);

      // Now let's move the uploaded image into the folder: image
      if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $targetFilePath)) {
        header("location:/lmstlee4/admin/gallery.php");
      } else {
        echo "<h3>  Failed to upload image!</h3>";
      }
    
        ?>
        <script type="text/javascript">
        toastr.success(
            "Plant Information Successfully Added"
        );
        setTimeout(function() {
            window.location = 'gallery.php?current_page=1';
        }, 1000);
        </script>
        <?php 
            } }
        ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#addplant">Add
                            Plant Info</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <?php

                    $count_query = "SELECT * FROM image";
                    $count_result = mysqli_query($conn, $count_query);
                    $count = mysqli_num_rows($count_result);

                    $limit = 3;
                    $max_pages = ceil($count / $limit);
                    $page= $_REQUEST['current_page'];
                    $pages = $page-1;
                    $p = $pages * $limit;

                      $query = "SELECT * FROM image limit  $p, $limit";
                      $result = mysqli_query($conn, $query);
                
                      while ($data = mysqli_fetch_assoc($result)) {
                        $imageURL = './uploads/' . $data["filename"];
                      ?>
                    <div class="col-lg-4 col-12">
                        <div class="card-body">
                            <div class="card-deck">
                                <div class="card mr-5" style="width:19rem; border:1px solid black;">
                                    <a type="submit" data-toggle="modal"
                                        data-target="#popup_plant<?php echo $data['id'];?>">
                                        <img class="card-img-top" style="height: 200px"
                                            src="<?php echo $imageURL; ?>"></a>
                                    <div class="card-body">
                                        <label class="text-dark mt-3">Plant Name:</label>
                                        <p class="text-dark font-20"><i><?php echo $data['plant_name'];?></i></p>
                                        <label class="text-dark">Plant Information:</label>
                                        <p class="text-dark"><?php echo $data['description'];?></p>
                                        <a type="submit" class="btn btn-danger mb-2 float-right" data-toggle="modal"
                                            data-target="#delete<?php echo $data['id'];?>"><i
                                                class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        include 'popup_plant.php';
                        include 'delete_plant.php';
                      }
                    ?>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body justify-content-between">
                            <center>
                                <?php
                                if($pages >= 1){
                                echo "<a class='btn btn-success' href= ".$_SERVER['PHP_SELF']."?page=gallery&current_page=".($page - 1)."><i class='fas fa-arrow-left'></i> Prev</a>";
                             }
                                if($pages < $max_pages-1){
                                echo "<a class='btn btn-success ml-1' href= ".$_SERVER['PHP_SELF']."?page=gallery&current_page=".($page + 1)."> Next <i class='fas fa-arrow-right'></i></a>";
                              }
                            ?>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal hide fade" id="addplant" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h4 id="myModalLabel" class="modal-title"><i class="fas fa-image"></i> Add Plant Info</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data">
                                <label class="float-left font-15">Name</label>
                                <input type="text" name="plant_name" class="form-control" placeholder="Enter Plant name"
                                    required=""><br>
                                <label class="">Description</label><br>
                                <textarea placeholder="Enter Plant Description" id="summernote" name="description"
                                    class="form-control" required=""></textarea><br>
                                <?php echo $statusMsg; ?>
                                <label class="font-15">Image</label><br>
                                <input type="file" name="uploadfile" value="" required="" />
                                <button class="btn btn-primary float-right" type="submit" name="upload">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript">
    $(document).ready(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 100
        });
        $('.delete-plant').click(function() {

            var id = $(this).attr("id");
            $.ajax({
                type: "POST",
                url: "del_query.php",
                data: ({
                    id: id
                }),
                cache: false,
                success: function(html) {
                    $("#delete" + id).fadeOut('slow',
                        function() {
                            $(this).remove();
                        });
                    $('#' + id).modal('hide');
                    toastr.error("Plants Information Successfully Deleted.");
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                },
            });
            return false;
        });
    });
    </script>
    <script>
    $(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.filter-container').filterizr({
            gutterPixels: 3
        });
        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    })
    </script>
    <script>
    // Summernote
    $('#summernote').summernote({
        toolbar: [
            ["style", ["style"]],
            ["font", ["bold", "underline", "clear"]],
            ["fontname", ["fontname"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["insert", ["link", "height"]],
            ["view", ["fullscreen", "help"]]
        ]
    })
    </script>

</body>

</html>