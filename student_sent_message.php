<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMSTLE | Send Message</title>

    <?php include 'header.php'; ?>
    <?php include('session.php'); ?>
    <?php include 'script.php'; ?>
</head>

<body>
    <?php include 'homepage.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Send Message</h1>
                    </div>
                    <?php
						$school_year_query = mysqli_query($conn,"select * from tbl_school_year order by school_year DESC")or die(mysqli_error());
						$school_year_query_row = mysqli_fetch_array($school_year_query);
						$school_year = $school_year_query_row['school_year'];
								?>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Send Message</li>
                            <li class="breadcrumb-item active">School Year:
                                <?php echo $school_year_query_row['school_year']; ?></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <a href="student_message.php" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

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
                                        <a href="student_message.php" class="nav-link">
                                            <i class="fas fa-inbox"></i> Inbox
                                            <span class="badge bg-primary float-right">12</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="student_sent_message.php" class="nav-link">
                                            <i class="far fa-envelope"></i> Sent
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Send Messages</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="mailbox-controls">
                                    <div class="btn-group">
                                        <button href="#del<?php echo $id; ?>" data-toggle="modal" type="button"
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
								                $query_announcement = mysqli_query($conn,"select * from tbl_message_sent
															LEFT JOIN tbl_student ON tbl_student.student_id = tbl_message_sent.receiver_id
															where  sender_id = '$session_id'  order by date_sended DESC
															")or die(mysqli_error());
								                $count_my_message = mysqli_num_rows($query_announcement);
								                    if ($count_my_message != '0'){
								                        while($row = mysqli_fetch_array($query_announcement)){
								                        $id = $row['message_sent_id'];
								            ?>
                                            <tr>
                                                <td>
                                                    Send to: <strong><?php echo $row['receiver_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['content']; ?>
                                                </td>
                                                <td class="mailbox-date"><i class="fas fa-calendar"></i>
                                                    <?php echo $row['date_sended']; ?></td>
                                                <td>
                                                    <a class="btn btn-link" href="#del<?php echo $id; ?>"
                                                        data-toggle="modal"><i class="fas fa-trash"></i> Remove
                                                    </a>
                                                    <?php include("remove_sent_message_modal.php"); ?>
                                                </td>
                                            </tr>
                                            <?php }}else{ ?>
                                            <div class="alert alert-info"><i class="fas fa-info-circle"></i> No
                                                Message in your
                                                Sent Items</div>
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
                                                    alert(
                                                        "Your Sent message is Successfully Deleted", {
                                                            header: 'Data Delete'
                                                        }); window.location.reload()
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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Send New Message</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" id="send_message">
                                    <div class="form-group">
                                        <label>To:</label>
                                        <select name="teacher_id" class="form-control" required>
                                            <option></option>
                                            <?php
											$query = mysqli_query($conn,"select * from tbl_teacher order by firstname");
											while($row = mysqli_fetch_array($query)){
											?>
                                            <option value="<?php echo $row['teacher_id']; ?>">
                                                <?php echo $row['firstname']; ?>
                                                <?php echo $row['lastname']; ?> </option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="my_message" class="my_message" style="height: 100px; width:100%"
                                            required>
                                    </textarea>
                                    </div>
                                    <div class="card-footer">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="far fa-envelope"></i>
                                                Send</button>
                                        </div>
                                    </div>
                                </form>
                                <script>
                                jQuery(document).ready(function() {
                                    jQuery("#send_message").submit(function(e) {
                                        e.preventDefault();
                                        var formData = jQuery(this).serialize();
                                        $.ajax({
                                            type: "POST",
                                            url: "send_message.php",
                                            data: formData,
                                            success: function(html) {
                                                alert("Message Successfully Sended")
                                                var delay = 1000;
                                                setTimeout(function() {
                                                    window.location =
                                                        'student_sent_message.php'
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