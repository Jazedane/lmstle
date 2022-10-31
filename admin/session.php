<?php
session_start();

if (!isset($_SESSION['id']) || trim($_SESSION['id']) == '') { ?>
<script>
window.location = "/lmstlee4/teacher-login.php";
</script>
<?php }
$session_id = $_SESSION['id'];