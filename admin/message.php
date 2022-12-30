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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <script>
    $(function() {
        $('.checkbox-toggle').click(function() {
            var clicks = $(this).data('clicks')
            if (clicks) {
                //Uncheck all checkboxes
                $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass(
                    'fa-square')
            } else {
                //Check all checkboxes
                $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass(
                    'fa-check-square')
            }
            $(this).data('clicks', !clicks)
        })

        //Handle starring for font awesome
        $('.mailbox-star').click(function(e) {
            e.preventDefault()
            //detect type
            var $this = $(this).find('a > i')
            var fa = $this.hasClass('fa')

            //Switch states
            if (fa) {
                $this.toggleClass('fa-star')
                $this.toggleClass('fa-star-o')
            }
        })
    })
    </script>
    <script>
    $(function() {
        $('#my_message').summernote()
    })
    </script>
</body>

</html>