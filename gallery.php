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
    <?php include 'homepage.php'; ?>
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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <?php
                        $limit = 4;
                        $page= $_REQUEST['page'];
                        $pages = $page-1;
                        $p = $pages * $limit;

                      $query = "SELECT * FROM image limit $p, $limit";
                      $result = mysqli_query($conn, $query);

                      while ($data = mysqli_fetch_assoc($result)) {
                        $imageURL = 'admin/uploads/' . $data["filename"];
                      ?>
                    <div class="col-lg-3 col-12">
                        <div class="card-deck">
                            <div class="card mr-5" style="width:15rem; border:1px solid black;">
                                <a type="submit" data-toggle="modal"
                                    data-target="#popup_plant<?php echo $data['id'];?>">
                                    <img class="card-img-top" height="200" src="<?php echo $imageURL; ?>"></a>
                                <div class="card-body">
                                    <label class="text-dark">Plant Name:</label>
                                    <p class="text-dark font-20"><i><?php echo $data['plant_name'];?></i></p>
                                    <label class="text-dark">Plant Information:</label>
                                    <p class="text-dark"><?php echo $data['description'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php

                        include './popup_plant.php';
                      }
                      ?>
                    <div class="m-auto justify-between">

                        <?php
                                if($pages >= 1){
                                echo "<a class='btn btn-success' href= ".$_SERVER['PHP_SELF']."?page=".($page - 1)."><i class='fas fa-backward'></i> Prev</a>";
                             }
                                if($page + 1 < $limit){
                                echo "<a class='btn btn-success' href= ".$_SERVER['PHP_SELF']."?page=".($page + 1)."><i class='fas fa-forward'></i> Next</a>";
                              }
                            ?>

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