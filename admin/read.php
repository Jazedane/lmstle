<?php
include 'dbcon.php';
include 'session.php';
if (isset($_POST['read'])) {

    $id = $_POST['selector'];
    $N = count($id);
    for ($i = 0; $i < $N; $i++) {
        mysqli_query(
            $conn,
            "UPDATE notification SET is_read=true WHERE notification_id='$id[$i]'"
        ) or die(mysqli_error());
    }
    ?>
<script>
window.location = 'notification_teacher.php';
</script>
<?php
}
?>
