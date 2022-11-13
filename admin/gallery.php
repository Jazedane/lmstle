<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Dashboard</title>

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
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary ml-5 float-right" data-toggle="modal"
                                    data-target="#addplant">Add Plant</button>
                            </div>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>Image</th>
                                        <th>Plant Name</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <?php
                                $query = "SELECT * FROM image ";
                                $result = mysqli_query($conn, $query);

                                while ($data = mysqli_fetch_assoc($result)) {
                                  $imageURL = './uploads/' . $data["filename"];
                                ?>
                                <tbody>
                                    <tr class="text-center">
                                        <td><a href="<?php echo $imageURL; ?>"><img style="width: 240px; height:200px"
                                                    src="<?php echo $imageURL; ?>"></a></td>
                                        <td>
                                            <p class="text-dark font-20"><i><?php echo $data['plant_name'];?></i></p>
                                        </td>
                                        <td>
                                            <p class="text-dark"><?php echo $data['description'];?></p>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <div class="modal fade" id="addplant" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content text-center ">
                <div class="modal-header bg-success">
                    <h3 class="modal-title text-white "><b>Add Plant</b></h3>
                    <button type="button" class="close" data-dismiss="modal">
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
                        <input type="file" name="uploadfile" value="" required />
                        <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>

</body>

</html>