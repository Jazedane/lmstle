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

    // If upload button is clicked ...
      if (isset($_POST['upload'])  && !empty($_FILES["uploadfile"]["name"])) {

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
    }

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
                        $limit = 3;
                        $page= $_REQUEST['page'];
                        $pages = $page-1;
                        $p = $pages * $limit;

                      $query = "SELECT * FROM image limit  $p, $limit";
                      $result = mysqli_query($conn, $query);
                
                      while ($data = mysqli_fetch_assoc($result)) {
                        $imageURL = './uploads/' . $data["filename"];
                      ?>
                    <div class="col-lg-3 col-12">
                        <div class="card-deck">
                            <div class="card mr-5" style="width:15rem; border:1px solid black;">
                                <a type="submit" data-toggle="modal"
                                    data-target="#popup_plant<?php echo $data['id'];?>">
                                    <img class="card-img-top" style="height: 200px" src="<?php echo $imageURL; ?>"></a>
                                <div class="card-body">
                                    <label class="text-dark mt-3">Plant Name:</label>
                                    <p class="text-dark font-20"><i><?php echo $data['plant_name'];?></i></p>
                                    <label class="text-dark">Plant Information:</label>
                                    <p class="text-dark"><?php echo $data['description'];?></p>
                                    <button type="submit" class="btn btn-danger mb-2 float-right" data-toggle="modal"
                                        data-target="#delete<?php echo $data['id'];?>"><i
                                            class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        include 'popup_plant.php';
                        include 'delete_plant.php';
                      }?>
                    <div class="m-auto justify-content-between">
                        <?php
                                if($pages >= 1){
                                echo "<a class='btn btn-success' href= ".$_SERVER['PHP_SELF']."?page=".($page - 1)."><i class='fas fa-arrow-left'></i> Prev</a>";
                             }
                                if($page + 1 < $limit){
                                echo "<a class='btn btn-success' href= ".$_SERVER['PHP_SELF']."?page=".($page + 1)."> Next <i class='fas fa-arrow-right'></i></a>";
                              }
                            ?>

                    </div>
                </div>
            </div>
        </section>

        <div class="modal hide fade" id="addplant" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h4 id="myModalLabel" class="modal-title">Add Plant Info</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data">
                                <label class="float-left font-15">Name</label>
                                <input type="text" name="plant_name" class="form-control" placeholder="Enter Plant name"
                                    required=""><br>
                                <label class="float-left font-15">Description</label>
                                <textarea placeholder="Enter Plant Description" name="description" class="form-control"
                                    required=""></textarea><br>
                                <?php echo $statusMsg; ?>
                                <label class="float-left font-15">Image</label><br>
                                <input type="file" name="uploadfile" value="" required="" />
                                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
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

</body>

</html>