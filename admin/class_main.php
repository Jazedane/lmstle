<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Class</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
</head>

<body id="class_div">
    <?php include 'index.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Class</h1>
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
                            <li class="breadcrumb-item active"><a href="#"><b>Class</b></a></li>

                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <form method="post" id="add_class">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Add Class</h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Class Name</label>
                                        <input type="hidden" name="session_id" value="<?php echo $session_id; ?>"
                                            class="form-control" required>
                                        </input>
                                        <select name="class_id" class="form-control" required>
                                            <option></option>
                                            <?php
											$query = mysqli_query($conn,"select * from tbl_class order by class_name");
											while($row = mysqli_fetch_array($query)){
											
											?>
                                            <option value="<?php echo $row['class_id']; ?>">
                                                <?php echo $row['class_name']; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject:</label>
                                        <select name="subject_id" class="form-control" required>
                                            <option></option>
                                            <?php
											$query = mysqli_query($conn,"select * from tbl_subject order by subject_code");
											while($row = mysqli_fetch_array($query)){
											
											?>
                                            <option value="<?php echo $row['subject_id']; ?>">
                                                <?php echo $row['subject_code']; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>School Year:</label>
                                        <div class="controls">
                                            <?php
											$query = mysqli_query($conn,"select * from tbl_school_year order by school_year DESC");
											$row = mysqli_fetch_array($query);
											?>
                                            <input id="" class="form-control" type="text" class="" name="school_year"
                                                value="<?php  echo $row['school_year']; ?>">
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <center><button name="save" type="submit" value="Upload"
                                                class="btn btn-success">Add</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Class</h3>
                            </div>

                            <div class="card-body">
                                <ul class="row">
                                    <?php
                                        ($query = mysqli_query(
                                        $conn,
                                            "SELECT * FROM tbl_teacher_class 
                                            LEFT JOIN tbl_class ON tbl_class.class_id = tbl_teacher_class.class_id 
                                            WHERE teacher_id = '$session_id' 
                                                AND school_year = '$school_year'
                                                AND tbl_class.isDeleted = false"
                                        )) or die(mysqli_error());
                                        $count = mysqli_num_rows($query);

                                        if ($count > 0) {
                                            while ($row = mysqli_fetch_array($query)) {
                                                $id = $row['teacher_class_id']; 
                                                $class_id = $row['class_id'];
                                                ?>

                                    <div id="<?php echo $id; ?>" style="border:1px solid black;margin-right:10px">
                                        <center><a href="my_students.php<?php echo '?id=' . $id; ?>">
                                                <img src="<?php echo $row['thumbnails']; ?>" width="124" height="140"
                                                    class="img-thumbnail" alt="">
                                            <p class="class"><?php echo $row['class_name']; ?></p></a>
                                        </center>
                                    </div>

                                    <?php
                                            }
                                        } else {
                                    ?>
                                    <div class="alert alert-primary"><i class="fas fa-info-circle"></i> No Class
                                        Currently Added</div>
                                    <?php
                                        }
                                        ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>
    <script>
    jQuery(document).ready(function($) {
        $("#add_class").submit(function(e) {
            e.preventDefault();
            var _this = $(e.target);
            var formData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "add_class_action.php",
                data: formData,
                success: function(html) {
                    if (html == "true") {
                        $.jGrowl("Class Already Exist", {
                            header: 'Add Class Failed'
                        });
                    } else {
                        $.jGrowl("Class Successfully  Added", {
                            header: 'Class Added'
                        });
                        var delay = 500;
                        setTimeout(function() {
                            window.location =
                                'class.php'
                        }, delay);
                    }
                }
            });
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.remove').click(function() {
            var id = $(this).attr("id");
            var name = $(this).attr("name");
            $.ajax({
                type: "POST",
                url: "delete_class.php",
                data: ({
                    id: id
                }),
                cache: false,
                success: function(html) {
                    $("#del" + name).fadeOut('slow', function() {
                        $(this).remove();
                    });
                    $('#' + id).modal('hide');
                    $.jGrowl("Your Class is Successfully Deleted", {
                        header: 'Class Delete'
                    });
                }
            });
            return false;
        });
    });
    </script>
</body>

</html>