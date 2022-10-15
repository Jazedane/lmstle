<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
    <?php include('sidebar2.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span9" id="content">
                <div class="row-fluid">
                    <?php include('my_students_breadcrumb.php'); ?>
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left">
                                <?php 
								$my_student = mysqli_query($conn,"SELECT * FROM teacher_class_student
														LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
														INNER JOIN class ON class.class_id = student.class_id where teacher_class_id = '$get_id' order by lastname ")or die(mysqli_error());
								$count_my_student = mysqli_num_rows($my_student);?>
                                Number of Students: <span
                                    class="badge badge-info"><?php echo $count_my_student; ?></span>
                            </div>
                            <div class="pull-right">
                                    <a href="print_student.php<?php echo '?id='.$get_id; ?>" class="btn btn-info"><i
                                            class="fa-solid fa-list"></i> Student List</a>
                                </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <div class="col">
                                    <ul id="da-thumbs" class="da-thumbs">
                                        <?php
														$my_student = mysqli_query($conn,"SELECT * FROM teacher_class_student
														LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
														INNER JOIN class ON class.class_id = student.class_id where teacher_class_id = '$get_id' order by lastname ")or die(mysqli_error());
														while($row = mysqli_fetch_array($my_student)){
														$id = $row['teacher_class_student_id'];
														?>
                                        <li id="del<?php echo $id; ?>">
                                            <a href="#">
                                                <img id="student_avatar_class"
                                                    src="/lmstle/admin/<?php echo $row['location'] ?>" width="124"
                                                    height="140" class="img-polaroid">
                                                <div>
                                                    <span>
                                                        <p><?php ?></p>

                                                    </span>
                                                </div>
                                            </a>
                                            <p class="student"><?php echo $row['firstname']." ".$row['lastname']?></p>
                                            <a href="#<?php echo $id; ?>" data-toggle="modal"><i
                                                    class="fa-solid fa-trash-can"></i> Remove</a>
                                        </li>
                                        <?php include("remove_student_modal.php"); ?>
                                        <?php } ?>
                                    </ul>
                                    <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('.remove').click(function() {
                                            var id = $(this).attr("id");
                                            $.ajax({
                                                type: "POST",
                                                url: "remove_student.php",
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
                                                        "Your Student is Successfully Remove", {
                                                            header: 'Student Remove'
                                                        });
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
            <?php include('footer.php'); ?>
        </div>
        <?php include('script.php'); ?>
        <div>
</body>

</html>