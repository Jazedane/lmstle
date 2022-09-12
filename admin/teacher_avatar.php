 <?php
 include('dbcon.php');
 include('session.php');
 
 
                            if (isset($_POST['change'])) {
                               

                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                $filePath = $_SERVER['DOCUMENT_ROOT'] . "/lmstle/admin/uploads/";

                                move_uploaded_file($_FILES["image"]["tmp_name"], $filePath . $_FILES["image"]["name"]);
                                $location = $_FILES["image"]["name"];
								
								mysqli_query($conn,"update  teacher set location = '$location' where teacher_id  = '$session_id' ")or die(mysqli_error());
                            }
?>

 <script>
window.location = "admin_dashboard.php";
 </script>