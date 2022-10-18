<?php include 'header.php'; ?>
<?php include 'session.php'; ?>

<body>
    <?php include 'sidebar.php'; ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span8" id="content">
                <div class="row-fluid">

                    <ul class="breadcrumb">
                        <?php
                        ($school_year_query = mysqli_query(
                            $conn,
                            'select * from school_year order by school_year DESC'
                        )) or die(mysqli_error());
                        $school_year_query_row = mysqli_fetch_array(
                            $school_year_query
                        );
                        $school_year = $school_year_query_row['school_year'];
                        ?>
                        <li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
                        <li><a href="#">School Year: <?php echo $school_year_query_row[
                            'school_year'
                        ]; ?></a><span class="divider">/</span></li>
                        <li><a href="#"><b>Notification</b></a></li>
                    </ul>

                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left"> New Notifications </div>
                        </div>

                        <div class="block-content collapse in">
                            <div class="span12">
                                <form action="read.php" method="post">

                                    <div>
                                        <button id="delete" class="btn btn-success" name="read"><i
                                                class="fa-solid fa-check"></i> Mark as Read</button>

                                        <div style="margin-bottom: 10px;">
                                            <input type="checkbox" name="selectAll" id="checkAll" /> Select All
                                        </div>

                                        <script>
                                        $("#checkAll").click(function() {
                                            $('input:checkbox').not(this).prop('checked', this.checked);
                                        });
                                        </script>
                                    </div>

                                    <?php
                                    ($query = mysqli_query(
                                        $conn,
                                        "SELECT * FROM notification 
                                        LEFT JOIN student ON broadcaster_id=student.student_id
                                        LEFT JOIN class ON class.class_id=student.class_id
                                        WHERE receiver_id = '$session_id' AND is_read = false"
                                    )) or die(mysqli_error($conn));

                                    $count = mysqli_num_rows($query);
                                    if ($count > 0) {
                                        while (
                                            $row = mysqli_fetch_array($query)
                                        ) {

                                            $get_id = $row['broadcaster_id'];
                                            $id = $row['notification_id'];
                                            $is_read = $row['is_read'];

                                    ?>

                                    <div class="post" id="del<?php echo $id; ?>">
                                        <?php if ($is_read == true) {
                                        } else {
                                             ?>
                                        <input id="" class="" name="selector[]" type="checkbox"
                                            value="<?php echo $id; ?>">
                                        <?php
                                        } ?>

                                        <strong><?php echo $row['firstname'] .
                                            ' ' .
                                            $row['lastname']; ?></strong>

                                        <?php echo $row['message']; ?> in
                                        <a class="btn-link" href="<?php echo $row[
                                            'link'
                                        ]; ?>">
                                            <?php echo $row['class_name']; ?>
                                        </a>

                                        <div class="pull-right"><b>Notification date: </b>
                                            <?php
                                        $date = date_create($row['date']);
                                        echo date_format(
                                            $date,
                                            'M/d/Y h:i:s a'
                                        );
                                        ?>
                                        </div>
                                    </div>

                                    <?php
                                        }
                                    } else {
                                         ?>
                                    <div class="alert alert-info"><strong><i class="fa-solid fa-bell"></i> No
                                            Notifications Found</strong></div>
                                    <?php
                                    }
                                    ?>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left"> Notification History </div>
                        </div>

                        <div class="block-content collapse in">
                            <div class="span12">
                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th>Notification</th>
                                            <th>Notification Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        ($query = mysqli_query(
                                        $conn,
                                        "SELECT * FROM notification 
                                            LEFT JOIN student ON broadcaster_id=student.student_id
                                            LEFT JOIN class ON class.class_id=student.class_id
                                            WHERE receiver_id = '$session_id' AND is_read = true"
                                            )) or die(mysqli_error());
                                        $count = mysqli_num_rows($query);
                                        if ($count > 0) {
                                        while ($row = mysqli_fetch_array($query)) {

                                        $get_id = $row['broadcaster_id'];
                                        $id = $row['notification_id'];
                                        $is_read = $row['is_read'];
                                        ?>

                                        <tr>
                                            <td><strong><?php echo $row['firstname'] .
                                        ' ' .
                                        $row['lastname']; ?></strong>

                                                <?php echo $row['message']; ?> in
                                                <a class="btn-link" href="<?php echo $row[
                                        'link'
                                        ]; ?>">
                                                    <?php echo $row['class_name']; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php
                                        $date = date_create($row['date']);
                                        echo date_format(
                                            $date,
                                            'M/d/Y h:i:sa'
                                        );
                                        ?>
                                            </td>
                                        </tr>

                                        <?php
                                        }
                                        } else {
                                        ?>
                                        <div class="alert alert-info"><strong><i class="fa-solid fa-info-circle"></i> No
                                                Notifications Found</strong></div>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    </div>
    <?php include 'script.php'; ?>
</body>

</html>