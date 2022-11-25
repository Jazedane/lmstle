<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Send Message</title>

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
                        <h1>Send Message</h1>
                    </div>
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
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Send Message</li>
                            <li class="breadcrumb-item active">School Year:
                                <?php echo $school_year_query_row[
                                    'school_year'
                                ]; ?></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <a href="message.php" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

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
                                    ($message_query = mysqli_query(
                                        $conn,
                                        "select * from tbl_message where receiver_id = '$session_id' 
                                    and message_status != 'read' "
                                    )) or die(mysqli_error());
                                    $count_message = mysqli_num_rows(
                                        $message_query
                                    );
                                    ?>
                                    <li class="nav-item">
                                        <a href="message.php" class="nav-link">
                                            <i class="fas fa-inbox"></i> Inbox
                                            <?php if ($count_message == '0') {
                                            } else {
                                                 ?>
                                            <span
                                                class="badge bg-primary float-right"><?php echo $count_message; ?></span>
                                            <?php
                                            } ?>
                                        </a>
                                    </li>
                                    <li class="nav-item active">
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
                                <h3 class="card-title">Send Message</h3>

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
                                    "SELECT * FROM tbl_message_sent
                                LEFT JOIN tbl_teacher ON tbl_teacher.teacher_id = tbl_message_sent.sender_id 
                                WHERE tbl_message_sent.sender_id = '$session_id' 
                                ORDER BY date_sended DESC"
                                )) or die(mysqli_error());
                                $count_my_message = mysqli_num_rows(
                                    $query_announcement
                                );
                                if ($count_my_message != '0') {
                                    while (
                                        $row = mysqli_fetch_array(
                                            $query_announcement
                                        )
                                    ) {

                                        $id = $row['message_sent_id'];
                                        $sender_id = $row['sender_id'];
                                        $sender_name =
                                            $row['firstname'] .
                                            ' ' .
                                            $row['lastname'];
                                        $receiver_name = $row['receiver_name'];
                                        ?>
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">
                                            <strong>Send by: You to Student
                                                <?php echo $row[
                                                    'receiver_name'
                                                ]; ?></strong></span>
                                        <span class="direct-chat-timestamp float-right"><?php echo $row[
                                                'date_sended'
                                            ]; ?></span>
                                    </div>
                                    <img class="direct-chat-img" src="/lmstlee4/admin/uploads/<?php echo $row[
                                            'location'
                                        ]; ?>" alt="Message User Image">
                                    <div class="direct-chat-text" style="height:50px;background-color:success">
                                        <?php echo $row['content']; ?>
                                        <a class="btn btn-danger float-sm-right" href="#del<?php echo $id; ?>"
                                            data-toggle="modal"><i class="fas fa-trash"></i>
                                        </a>
                                        <?php include 'remove_sent_message_modal.php'; ?>
                                    </div>
                                </div>
                                <?php
                                    }
                                } else {
                                     ?>
                                <div class="alert alert-primary"><i class="fas fa-info-circle"></i> No Messages in your
                                    Sent Items</div>
                                <?php
                                }
                                ?>
                                <script type="text/javascript">
                                $(document).ready(function() {
                                    var Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
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
                                                toastr.error(
                                                    "Your Sent message is Successfully Deleted."
                                                    );
                                                setTimeout(function() {
                                                    window.location.reload();
                                                }, 2000);
                                            },
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
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-4">
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
                                        $query = mysqli_query(
                                            $conn,
                                            "SELECT * FROM tbl_teacher_class_student
                                            LEFT JOIN tbl_student ON tbl_student.student_id = tbl_teacher_class_student.student_id 
                                            WHERE tbl_student.isDeleted=false AND teacher_id = '$session_id'
                                            GROUP BY tbl_teacher_class_student.student_id order by firstname ASC"
                                        );
                                        while (
                                            $row = mysqli_fetch_array($query)
                                        ) { ?>
                                        <option value="<?php echo $row[
                                            'student_id'
                                        ]; ?>">
                                            <?php echo $row['firstname']; ?>
                                            <?php echo $row[
                                                'lastname'
                                            ]; ?> </option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Content:</label>
                                    <textarea name="my_message" rows="3" class="my_message form-control" required>
                                    </textarea>
                                </div>
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i>
                                            Send</button>
                                    </div>
                                </div>
                            </form>
                            <script>
                            jQuery(document).ready(function() {
                                var Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                jQuery("#send_message_student").submit(function(e) {
                                    e.preventDefault();
                                    var formData = jQuery(this).serialize();
                                    $.ajax({
                                        type: "POST",
                                        url: "send_message_teacher_to_student.php",
                                        data: formData,
                                        success: function(html) {
                                            toastr.success("Message Successfully Sent");
                                            setTimeout(function() {
                                                window.location =
                                                    'sent_message.php';
                                            }, 2000);
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
        //Enable check and uncheck all functionality
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
        $('#compose-textarea').summernote()
    })
    </script>
</body>

</html>