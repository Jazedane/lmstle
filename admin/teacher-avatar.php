 <?php
 include('database.php');
 include('session.php');
 
 
if (isset($_POST['change'])) {
                               
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);

    $filePath = $_SERVER['DOCUMENT_ROOT'] . "/lmstlee4/admin/uploads/";

    move_uploaded_file($_FILES["image"]["tmp_name"], $filePath . $_FILES["image"]["name"]);
    $location = $_FILES["image"]["name"];
								
	mysqli_query($conn,"update tbl_teacher set location = '$location' where teacher_id  = '$session_id' ")or die(mysqli_error());
}
?>

 <script>
window.location = "profile.php";
 </script>