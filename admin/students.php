<?php
    $class_id_filter = isset($_GET['class_id']) ? $_GET['class_id'] : '';
    $student_query = "SELECT * FROM tbl_student 
    LEFT JOIN tbl_class ON tbl_student.class_id = tbl_class.class_id 
    WHERE tbl_student.isDeleted=false
    ORDER BY lastname ASC";

    if ($class_id_filter) {
        $student_query = "SELECT * FROM tbl_student 
        LEFT JOIN tbl_class ON tbl_student.class_id = tbl_class.class_id 
        WHERE tbl_student.isDeleted=false AND tbl_student.class_id = '$class_id_filter'
        ORDER BY lastname ASC";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Students</title>

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
                            <li class="breadcrumb-item active">Add Student</li>
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
                                <h3 class="card-title" style="margin-top:10px">Student List</h3>
                                <a data-toggle="modal" href="#import_students" class="btn btn-success float-right"
                                    name="add_student"><i class="fas fa-upload"></i> Import</a>
                                <a data-toggle="modal" href="#student_add" class="btn btn-success float-right"
                                    name="add_student"><i class="fas fa-user-plus lg"></i> Add</a>
                            </div>

                            <div class="card-body">
                                <label class="float-right">Class Filter:&nbsp
                                    <select class="mb-3" id="class-filter">
                                        <option value="">Show All</option>
                                        <?php
                                        $query = mysqli_query(
                                        $conn,
                                        "SELECT * FROM tbl_class WHERE isDeleted=false"
                                        );
                                        while ($row = mysqli_fetch_array($query)) {
                                            $class_id = $row['class_id'];
                                            $class_name = $row['class_name'];
                                    ?>
                                        <option value="<?php echo $class_id; ?>"
                                            <?php echo $class_id == $class_id_filter ? 'selected' : ''; ?>>
                                            <?php echo $class_name; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </label>
                                <form id="delete_student" method="post">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <ul data-toggle="modal" href="#student_delete" class="btn btn-danger"
                                            name="delete_student"><i class="fas fa-trash-alt"></i> Remove</ul>
                                        <?php include 'modal_delete.php'; ?>
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
                                                <th>ID Number</th>
                                                <th>Gender</th>
                                                <th>Age</th>
                                                <th>Year & Section</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            ($query = mysqli_query(
                                                $conn,
                                                $student_query,
                                            )) or die(mysqli_error($conn));
                                            while ($row = mysqli_fetch_array($query)) {
                                            $id = $row['student_id']; ?>

                                            <tr>
                                                <td width="30">
                                                    <input id="checkAll" type="checkbox" value="<?php echo $id; ?>"
                                                        class="uniform_on" name="selector[]">
                                                    <label for="check1"></label>
                                                </td>
                                                <td><?php $firstname = $row['firstname'];
						                                $lastname = $row['lastname'];
                                                        $middlename = $row['middlename'];
						                                $firstname = strtoupper ($firstname);
						                                $lastname = strtoupper($lastname);
                                                        $middlename = strtoupper($middlename);
						                                echo $lastname .', '. $firstname .' '. $middlename = mb_substr($middlename, 0, 1).'.'; 
						                                $firstname = array($firstname);
						                                sort($firstname); ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php $gender = $row['gender'];
					                                $gender = strtoupper ($gender);
					                                echo $gender ?></td>
                                                <td><?php echo $row['age']; ?></td>
                                                <td><?php $class_name = $row['class_name'];
					                                $class_name = strtoupper ($class_name);
					                                echo $class_name ?></td>

                                                <td width="30"><a href="edit_student.php<?php echo '?id=' .
                                                    $id; ?>" class="btn btn-success"><i class="fas fa-edit"></i> </a>
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
        <div class="modal hide fade" id="student_add" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h4 id="myModalLabel" class="modal-title"><i class="fas fa-user-plus"></i> Add Student</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data">
                                <label>Select Section</label>
                                <select name="class_id" class="form-control" required>
                                    <option selected disabled hidden>SELECT SECTION</option>
                                    <?php
                                                $class_query = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbl_class WHERE tbl_class.isDeleted=false ORDER BY class_name"
                                                );
                                                while (
                                                    $class_row = mysqli_fetch_array(
                                                    $class_query
                                                )
                                                ) { ?>
                                    <option value="<?php echo $class_row[
                                                'class_id'
                                                ]; ?>">
                                        <?php echo $class_row[
                                                    'class_name'
                                                ]; ?></option>
                                    <?php }
                                            ?>
                                </select>
                                <label>ID Number</label>
                                <input name="username" type="varchar" maxlength="7" class="form-control"
                                    placeholder="ENTER ID NUMBER" onBlur='addDashes(this)' autocomplete="off" required>
                                <label>First Name</label>
                                <input name="firstname" type="text" class="form-control" placeholder="Enter Firstname"
                                    style="text-transform: uppercase" required>
                                <label>Middle Name</label>
                                <input name="middlename" type="text" class="form-control" placeholder="Enter Middlename"
                                    style="text-transform: uppercase" required>
                                <label>Last Name</label>
                                <input name="lastname" type="text" class="form-control" placeholder="Enter Lastname"
                                    style="text-transform: uppercase" required>
                                <label>Gender</label>
                                <select name="gender" class="form-control" placeholder="Gender" required>
                                    <option selected disabled hidden>SELECT GENDER</option>
                                    <option>MALE</option>
                                    <option>FEMALE</option>
                                </select>
                                <label>Age</label>
                                <input type="number" oninput="this.value = this.value.slice(0, this.dataset.maxlength);"
                                    data-maxlength="2" min="15" max="25" class="form-control" name="age"
                                    placeholder="AGE" required>
                                <input type="hidden" name="teacher_id" value="<?php echo $_SESSION['id'] ?>" />
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
        <div class="modal hide fade" id="import_students" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h4 id="myModalLabel" class="modal-title"><i class="fas fa-upload"></i> Import Excel/CSV
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="" enctype="multipart/form-data">
                                <label>Select Section</label>
                                <select name="class_id" class="form-control" required>
                                    <option selected disabled hidden>SELECT SECTION</option>
                                    <?php
                                                $class_query = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbl_class WHERE tbl_class.isDeleted=false ORDER BY class_name"
                                                );
                                                while (
                                                    $class_row = mysqli_fetch_array(
                                                    $class_query
                                                )
                                                ) { ?>
                                    <option value="<?php echo $class_row[
                                                'class_id'
                                                ]; ?>">
                                        <?php echo $class_row[
                                                    'class_name'
                                                ]; ?></option>
                                    <?php }
                                            ?>
                                </select>
                                <fieldset>
                                    <legend>Import Excel/CSV file</legend>
                                    <div class="form-group">
                                        <div class="control-label">
                                            <label>Excel/CSV File:</label>
                                        </div>
                                        <div class="controls">
                                            <input type="file" name="file" id="file" class="input-large" accept=".xls,.xlsx"
                                                style="text-transform: uppercase" required>
                                        </div>
                                    </div>
                                    <input type="hidden" name="teacher_id" value="<?php echo $_SESSION['id'] ?>" />
                                    <div class="form-group">
                                        <div class="modal-footer">
                                            <button type="submit" id="submit" name="import"
                                                class="btn btn-primary button-loading"
                                                data-loading-text="Loading...">Upload</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>

    <?php if (isset($_POST['save'])) {
        $class_id = $_POST['class_id'];
        $username = $_POST['username'];
        $firstname = strtoupper($_POST['firstname']);
        $middlename = strtoupper($_POST['middlename']);
        $lastname = strtoupper($_POST['lastname']);
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $teacher_id = $_POST['teacher_id'];
        $hashedPassword = hash('sha256', $lastname . $username);

        /**
         * Query teacher_class to get the teacher_class_id.
         */
        $query = "SELECT * FROM tbl_teacher_class WHERE teacher_id = '$teacher_id' AND class_id='$class_id';";
        $result = mysqli_query($conn, $query);
        $row   = mysqli_fetch_assoc($result);
        $teacher_class_id = $row['teacher_class_id'];

        ($query = mysqli_query(
            $conn,
            "SELECT * FROM tbl_student WHERE username  =  '$username' AND firstname  =  '$firstname' AND middlename  =  '$middlename' AND lastname  =  '$lastname'"
        )) or die(mysqli_error());
        $count = mysqli_num_rows($query);

        if ($count > 0) { ?>
    <script>
    toastr.warning("Warning", "Student Already Exists!");
    setTimeout(function() {
        window.location = "students.php";
    }, 1000);
    </script>
    <?php } else {mysqli_query(
            $conn,
            "INSERT INTO 
            tbl_student 
            (username,firstname,middlename,lastname,gender,age,location,class_id,status,password) 
            VALUES 
            ('$username','$firstname','$middlename','$lastname','$gender','$age','NO-IMAGE-AVAILABLE.jpg','$class_id','Registered','$hashedPassword');"
            ) or die(mysqli_error());

            /**
             * Since the student is new, we don't have the student_id, yet.
             * This retrieves the last auto-incremented ID on the 'student' table
             */
            $student_id = mysqli_insert_id($conn);

            /**
             * Add foreign key references and entry to 'teacher_class_student' table.
             */
            mysqli_query(
                $conn,
                "INSERT INTO 
                tbl_teacher_class_student 
                (teacher_class_id,student_id,teacher_id) 
                VALUES 
                ('$teacher_class_id','$student_id','$teacher_id');"
                        ) or die(mysqli_error());
                mysqli_query($conn,"INSERT into tbl_activity_log (date,username,action,teacher_id) values(NOW(),'$username','Add Student $firstname $lastname','$teacher_id')")
                    or die(mysqli_error());
    ?>
    <script>
    toastr.success("Success", "New Student Successfully Added!");
    setTimeout(function() {
        window.location = "students.php";
    }, 1000);
    </script>
    <?php } } ?>
    <?php 
    require('library/php-excel-reader/excel_reader2.php');
    require('library/SpreadsheetReader.php');
    
    $conn=mysqli_connect("localhost","root","","lmstlee4") or die("Could not connect");
    
    if(isset($_POST["import"])){

		$filename = $_FILES["file"]["tmp_name"];
        $class_id = $_POST['class_id'];
        $teacher_id = $_POST['teacher_id'];

        $query = "SELECT * FROM tbl_teacher_class WHERE teacher_id = '$teacher_id' AND class_id='$class_id';";
        $result = mysqli_query($conn, $query);
        $row   = mysqli_fetch_assoc($result);
        $teacher_class_id = $row['teacher_class_id'];
        
		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
                $username = $emapData[0];
                $firstname = strtoupper($emapData[1]);
                $middlename = strtoupper($emapData[2]);
                $lastname = strtoupper($emapData[3]);
                $gender = strtoupper($emapData[4]);
                $age = $emapData[5];
                $hashedPassword = hash('sha256', $lastname. $username);
	    
	          //It wiil insert a row to our subject table from our csv file`
	           $sql = "INSERT into tbl_student ( `class_id`,`username`,`firstname`, `middlename`, `lastname`, `gender`, `age`, `location`, `status`, `password`) 
	            	values('$class_id','$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]', 'NO-IMAGE-AVAILABLE.jpg','Registered','$hashedPassword')";
	         //we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysqli_query( $conn, $sql );
				if(! $result )
				{
					echo "<script type=\"text/javascript\">
						alert(\"Invalid File:Please Upload Excel File.\");
							window.location = \"students.php\";
						</script>";
				
				}

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"students.php\";
					</script>";
	        
			$student_id = mysqli_insert_id($conn);
                
                mysqli_query(
                $conn,
                "INSERT INTO 
                tbl_teacher_class_student 
                (teacher_class_id,student_id,teacher_id) 
                VALUES 
                ('$teacher_class_id','$student_id','$teacher_id');"
                        ) or die(mysqli_error());
                mysqli_query($conn,"INSERT into tbl_activity_log (date,username,action,teacher_id) values(NOW(),'$username','Add Students','$teacher_id')")
                    or die(mysqli_error());

			 //close of connection
			mysqli_close($conn); 
			
		 }
	}	 
?>
    <SCRIPT LANGUAGE="JavaScript">
    function addDashes(f) {
        f.value = f.value.replace(/\D/g, '');

        f.value = f.value.slice(0, 2) + "-" + f.value.slice(2, 8);
    }
    </SCRIPT>
    <script type="text/javascript">
    $(document).ready(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000
        });
        $('.delete_student').click(function() {
            var selectedIds = $('[name="selector[]"]:checked').map((_,
                element) => {
                return $(element).val()
            }).get()

            $.ajax({
                type: "POST",
                url: "delete_student.php",
                data: ({
                    selector: selectedIds,
                    delete_student: true
                }),
                success: function(html) {
                    toastr.error("Deleted",
                        "Student Successfully Deleted"
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
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "dom": 'Bfrtilp',
            "buttons": [{
                    "extend": 'copyHtml5',
                    "titleAttr": 'Copy',
                    "exportOptions": {
                        "columns": [1, 2, 3, 4, 5]
                    }
                },
                {
                    "extend": 'excelHtml5',
                    "titleAttr": 'Export to Excel',
                    "exportOptions": {
                        "columns": [1, 2, 3, 4, 5]
                    }
                },
                {
                    "extend": 'pdfHtml5',
                    "titleAttr": 'Export to PDF',
                    "exportOptions": {
                        "columns": [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'print',
                    messageTop: '<p align="right">Date: <b><?php date_default_timezone_set('Singapore'); echo $date= date('F d, Y');?></b></p>',
                    messageBottom: '<br><div class="float-right"><u><b><?php
                                            ($query = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbl_teacher WHERE isDeleted=false AND teacher_id=$session_id ORDER BY lastname"
                                            )) or die(mysqli_error());
                                            while (
                                                $row = mysqli_fetch_array(
                                                    $query
                                                )
                                            ) {
                                                $id = $row['teacher_id']; ?><?php $middlename = $row['middlename']; echo $row['firstname'] ." ". $middlename = mb_substr($middlename, 0, 1) .". ". $row['lastname'];?><?php } ?></b></u><p class="text-center">Teacher</p></div></br>',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    },
                    title: '<center><h5><b>Student Masterlist</b></h5></center>',
                    customize: function(win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<div class="text-center"><img src="http://localhost/lmstlee4/admin/dist/img/logo.png" style="width: 80px; height: 70px;position:absolute; top:0; left:240px;" alt="logo"/><h4><b>Bug-Ang National High School</b></h4><p><h6>Brgy. Bug-Ang, Toboso, Negros Occidental </h6></p></div><div><hr style="border-bottom: 3px solid black"></hr></div>'
                            );
                        $(win.document.body).find(
                                'table')
                            .addClass('compact')
                            .css('font-size',
                                'inherit');
                    }
                },
            ],
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
    $(document).ready(function() {
        $('.dataTables_filter input[type="search"]').css({
            'width': '220px',
            'display': 'inline-block'
        });
    });

    $(document).ready(() => {
        $('#class-filter').on('change', function() {
            var class_id = $(this).val();
            const url = new URL(window.location.href);
            const search_params = new URLSearchParams(url.search);
            const page = search_params.get('page');
            window.location.href =
                `${window.location.origin}${window.location.pathname}?page=${page}&class_id=${class_id}`;
        });
    });
    </script>
</body>

</html>