 <?php
 include('database.php');
 include('session.php');
 
 
if (isset($_POST['change'])) {
                               
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);

    move_uploaded_file($_FILES["image"]["tmp_name"], "/lmstlee4/admin/uploads/" . $_FILES["image"]["name"]);
    $location = $_FILES["image"]["name"];
	echo "update tbl_student set location = '$location' where student_id  = '$session_id' ";	
	mysqli_query($conn,"update tbl_student set location = '$location' where student_id  = '$session_id' ")or die(mysqli_error());

}
?>
 <script>
    alert("Avatar Successfully Change");
    window.location = "profile.php";
 </script>