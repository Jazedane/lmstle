<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Inbox</title>

    <?php include 'header.php'; ?>
    <?php include 'session.php'; ?>
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
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Inbox</li>
                            <li class="breadcrumb-item">School Year:
                                <?php echo $school_year_query_row['school_year']; ?></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-3">
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
                                <li class="nav-item active">
                                    <a href="message.php" class="nav-link">
                                        <i class="fas fa-inbox"></i> Inbox
                                        <span class="badge bg-primary float-right"></span>
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
                <div class="col-md-9">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Send New Message</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" id="send_message_student">
                                <div class="form-group">
                                    <label>To:</label>
                                    <select name="student_id" class="form-control" required>
                                        <option>Select Student</option>
                                        <?php
											$query = mysqli_query($conn,"select * from tbl_teacher_class_student
																  LEFT JOIN tbl_student ON tbl_student.student_id = tbl_teacher_class_student.student_id
											 group by tbl_teacher_class_student.student_id order by firstname ASC");
											while($row = mysqli_fetch_array($query)){
											
											?>
                                        <option value="<?php echo $row['student_id']; ?>">
                                            <?php echo $row['firstname']; ?>
                                            <?php echo $row['lastname']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Content:</label>
                                    <textarea name="my_message" class="my_message" id="my_message" class="form-control"
                                        style="height: 300px" required>
                                        <h1><u> </u></h1>
                                        <h4> </h4>
                                        <p> </p>
                                    </textarea>
                                </div>
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i>
                                            Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                                <h3 class="card-title">Send Messages</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="mailbox-controls">
                                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                            class="far fa-square"></i>
                                    </button>
                                    <div class="btn-group">
                                        <button href="#<?php echo $id; ?>" data-toggle="modal" type="button"
                                            class="btn btn-danger btn-sm">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-success btn-sm">
                                            <i class="fas fa-reply"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive mailbox-messages">
                                    <table class="table table-hover table-striped">
                                        <tbody>
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
                                            <tr>
                                                <td class="post" id="del<?php echo $id; ?>">
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check1">
                                                        <label for="check1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    Send by: <strong><?php echo $sender_name; ?></strong>
                                                </td>
                                                <td class="message_content">
                                                    <?php echo $row['content']; ?>
                                                </td>
                                                <td class="mailbox-date"><i class="fas fa-calendar"></i>
                                                    <?php echo $row['date_sended']; ?></td>
                                                <td>
                                                    <a class="btn btn-link" href="#reply<?php echo $id; ?>"
                                                        data-toggle="modal"><i class="fas fa-reply"></i> Reply </a>
                                                    <a class="btn btn-link" href="#<?php echo $id; ?>"
                                                        data-toggle="modal"><i class="fas fa-trash"></i> Remove
                                                    </a>
                                                    <?php include("remove_sent_message_modal.php"); ?>
                                                    <?php include 'reply_inbox_message_modal.php'; ?>
                                                </td>
                                            </tr>
                                            <?php }}else{ ?>
                                            <div class="alert alert-info"><i class="fas fa-info-circle"></i> No Inbox
                                                Messages</div>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('.remove').click(function() {

                                            var id = $(this).attr("id");
                                            $.ajax({
                                                type: "POST",
                                                url: "remove_sent_message.php",
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
                                                    $.jGrowl(
                                                        "Your Sent message is Successfully Deleted", {
                                                            header: 'Data Delete'
                                                        });
                                                }
                                            });
                                            return false;
                                        });
                                    });
                                    </script>
                                    <script>
                                    jQuery(document).ready(function() {
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
                                                    $.jGrowl("Message Successfully Sent", {
                                                        header: 'Message Sent'
                                                    });
                                                    $('#reply' + id).modal('hide');
                                                }

                                            });
                                            return false;
                                        });
                                    });
                                    </script>
                                    <script>
                                    jQuery(document).ready(function() {
                                        jQuery("#send_message_student").submit(function(e) {
                                            e.preventDefault();
                                            var formData = jQuery(this).serialize();
                                            $.ajax({
                                                type: "POST",
                                                url: "send_message_teacher_to_student.php",
                                                data: formData,
                                                success: function(html) {

                                                    alert("Message Successfully Sended", {
                                                        header: 'Message Sent'
                                                    });
                                                    var delay = 2000;
                                                    setTimeout(function() {
                                                        window.location =
                                                            'message.php'
                                                    }, delay);
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
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <?php include 'script.php'; ?>
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