<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Inbox</title>

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
                        <h1>Inbox</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Inbox</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-4">
                    <a href="sent_message.php" class="btn btn-primary btn-block mb-3">Send Message</a>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Folders</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <?php
			                        $message_query = mysqli_query($conn,"select * from tbl_message where receiver_id = '$session_id' 
                                    and message_status != 'read' ")or die(mysqli_error());
			                        $count_message = mysqli_num_rows($message_query);
		                        ?>
                                <li class="nav-item active">
                                    <a href="message.php" class="nav-link">
                                        <i class="fas fa-inbox"></i> Inbox
                                        <?php if($count_message == '0'){
				                        }else{ ?>
                                        <span class="badge bg-primary float-right"><?php echo $count_message; ?></span>
                                        <?php } ?>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="sent_message.php" class="nav-link">
                                        <i class="far fa-envelope"></i> Sent
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-success direct-chat direct-chat-success">
                        <div class="card-header">
                            <h3 class="card-title">Inbox</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div style="margin-top:10px;margin-bottom:20px">
                                    <button class="btn btn-success float-right" name="read"><i class="fas fa-check"></i>
                                        Mark as Read</button>
                                    <div>
                                        &nbsp Select All <input type="checkbox" name="selectAll" id="checkAll" />
                                    </div>
                                    <script>
                                    $("#checkAll").click(function() {
                                        $('input:checkbox').not(this).prop('checked', this.checked);
                                    });
                                    </script>
                                    <?php if (isset($_POST['read'])) {
                                        $id = $_POST['selector'];
                                        $N = count($id);
                                        for ($i = 0; $i < $N; $i++) {
                                            mysqli_query(
                                                $conn,
                                                "UPDATE tbl_message SET message_status='read' WHERE message_id='$id[$i]'"
                                            ) or die(mysqli_error());
                                        }
                                    ?>
                                    <script>
                                    window.location.reload();
                                    </script>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <?php
                                ($query_announcement = mysqli_query(
                                $conn,
                                "SELECT * FROM tbl_message 
                                LEFT JOIN tbl_student ON tbl_student.student_id = tbl_message.sender_id 
                                WHERE tbl_message.receiver_id = '$session_id'
                                ORDER BY date_sended DESC"
                                )) or die();
                                $count_my_message = mysqli_num_rows(
                                $query_announcement
                                );
                                if ($count_my_message != '0') {
                                while (
                                    $row = mysqli_fetch_array(
                                            $query_announcement
                                            )
                                ) {

                                $id = $row['message_id'];
                                $sender_id = $row['sender_id'];
                                $sender_name =
                                $row['firstname'] .' ' . $row['lastname'];
                                $receiver_name = $row['receiver_name'];
                                $message_status = $row['message_status'];
                                ?>
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">
                                            <strong>Send by: Student <?php echo $sender_name; ?> </strong></span>
                                        <span class="direct-chat-timestamp float-right"><?php $date_sended = date_create($row['date_sended']);
                                                    echo date_format(
                                                    $date_sended,
                                                    'F d, Y h:i A'
                                                    ); ?>
                                        </span>
                                    </div>
                                    <img class="direct-chat-img" src="uploads/<?php echo $row['location']; ?>"
                                        alt="Message User Image">
                                    <div class="direct-chat-text" style="height:50px;background-color:success">
                                        <?php echo $row['content']; ?>
                                        <?php if ($message_status == 'read') {
                                        } else {
                                             ?>
                                        <input id="checkAll" class="uniform_on" name="selector[]" type="checkbox"
                                            value="<?php echo $id; ?>" required>
                                        <?php
                                        } ?>
                                        <a class="btn btn-danger float-sm-right" href="#del<?php echo $id; ?>"
                                            data-toggle="modal"><i class="fas fa-trash"></i></a>
                                        <a class="btn btn-success float-sm-right" href="#reply<?php echo $id; ?>"
                                            data-toggle="modal"><i class="fas fa-reply"></i></a>
                                        <?php include("remove_inbox_message_modal.php"); ?>
                                        <?php include 'reply_inbox_message_modal.php'; ?>
                                    </div>
                                </div>
                                <?php }}else{ ?>
                                <div class="alert alert-primary"><i class="fas fa-info-circle"></i> No Inbox
                                    Messages</div>
                                <?php } ?>
                                <script type="text/javascript">
                                $(document).ready(function() {
                                    var Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 1000
                                    });
                                    $('.remove').click(function() {

                                        var id = $(this).attr("id");
                                        $.ajax({
                                            type: "POST",
                                            url: "remove_inbox_message.php",
                                            data: ({
                                                id: id
                                            }),
                                            cache: false,
                                            success: function(html) {
                                                $("#del" + id).fadeOut('slow',
                                                    function() {
                                                        $(this).remove();
                                                    });
                                                $('#' + id).modal('hide');
                                                toastr.error(
                                                    "Student Message Successfully Deleted", {}
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
                                <script type="text/javascript">
                                jQuery(document).ready(function() {
                                    var Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 1000
                                    });
                                    jQuery("#reply").submit(function(e) {
                                        e.preventDefault();
                                        var id = $('.reply').attr("id");
                                        var _this = $(e.target);
                                        var formData = jQuery(this).serialize();
                                        $.ajax({
                                            type: "POST",
                                            url: "reply.php",
                                            data: formData,
                                            success: function(html) {
                                                $(document).Toasts('create', {
                                                    class: 'bg-success',
                                                    body: 'Message Successfully Sent!',
                                                    title: 'Message',
                                                    subtitle: 'Success',
                                                    autohide: true,
                                                    delay: 1000,
                                                    icon: 'fas fa-envelope fa-lg',
                                                })
                                                $('#reply' + id).modal('hide');
                                            }
                                        });
                                        return false;
                                    });
                                });
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <script>
    $(function() {
        $('#my_message').summernote()
    })
    </script>
</body>

</html>