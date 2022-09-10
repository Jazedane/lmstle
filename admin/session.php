<?php
 session_start(); 

if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) { ?>
<script>
window.location = "admin_index.php";
</script>
<?php
}
$session_id=$_SESSION['id'];

$query = mysqli_query($conn,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
$row = mysqli_fetch_array($query);
$username = $row['username'];
?>