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
                <div class="card-body">
                        <button type="submit" class="btn btn-primary ml-5 float-right" data-toggle="modal"
                            data-target="#addplant">Add Plant</button>
                    </div>
                <div class="row">
                    <?php
                                $query = "SELECT * FROM image ";
                                $result = mysqli_query($conn, $query);

                                while ($data = mysqli_fetch_assoc($result)) {
                                  $imageURL = './uploads/' . $data["filename"];
                                ?>
                    <div class="card-deck">
                        <div class="card" style="width:16rem;border:1px solid black;margin:40px">
                            <img class="card-img-top" src="<?php echo $imageURL; ?>" alt="Card image cap" height="200">
                            <div class="card-body">
                                <div class="card-title"><b>Plant Name:</b>
                                    <?php echo $data['plant_name'];?>
                                </div>
                                <p class="card-text"><b>Plant Information:</b>
                                    <?php echo $data['description'];?></p>
                            </div>
                        </div>
                        <?php
                                }
                                ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

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
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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