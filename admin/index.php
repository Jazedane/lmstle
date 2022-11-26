<?php include 'header.php'; ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-success navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="dashboard.php" class="nav-link">Home</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="fas fa-cog fa-spin"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Settings</span>
                        <div class="dropdown-divider"></div>
                        <a href="profile.php" class="dropdown-item" type="button"><i class="fas fa-user-circle"></i>
                            Profile</a>
                        <a href="change_password.php" class="dropdown-item" type="button"><i class="fas fa-edit"></i>
                            Change Password</a>
                        <a href="developer.php" class="dropdown-item" type="button"><i class="fas fa-users"></i>
                            Developer</a>
                        <a href="logout.php" class="dropdown-item" type="button"><i class="fas fa-sign-out-alt"></i>
                            Logout</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a class="brand-link">
                <img src="dist/img/logo.png" alt="BNHS Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Admin/Teacher</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <?php $query= mysqli_query($conn,"select * from tbl_teacher where teacher_id = '$session_id'")or die(mysqli_error());
								  $row = mysqli_fetch_array($query);
						?>
                    <div class="image">
                        <img id="avatar" src="/lmstlee4/admin/uploads/<?php echo $row['location']; ?>"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $row['firstname']." ".$row['lastname'];  ?> </a>
                    </div>
                </div>

                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="page.php?page=dashboard" class="nav-link nav-dashboard tree-item">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="page.php?page=class_main" class="nav-link nav-class_main tree-item">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Class
                                </p>
                            </a>
                        </li>
                        <?php
			                $notification_query = mysqli_query($conn,"select * from tbl_notification where receiver_id = '$session_id' 
                            and is_read=false ")or die(mysqli_error());
			                $count_notification = mysqli_num_rows($notification_query);
		                ?>
                        <li class="nav-item">
                            <a href="page.php?page=notification" class="nav-link nav-notification tree-item">
                                <i class="nav-icon fas fa-bell"></i>
                                <p>
                                    Notification
                                </p>
                                <?php if($count_notification == '0'){
				                    }else{ ?>
                                <span class="badge bg-primary float-right"><?php echo $count_notification; ?></span>
                                <?php } ?>
                            </a>
                        </li>
                        <?php
			                $message_query = mysqli_query($conn,"select * from tbl_message where receiver_id = '$session_id' 
                            and message_status != 'read' ")or die(mysqli_error());
			                $count_message = mysqli_num_rows($message_query);
		                ?>
                        <li class="nav-item">
                            <a href="page.php?page=message" class="nav-link nav-message tree-item">
                                <i class="nav-icon fas fa-comments"></i>
                                <p>
                                    Message
                                </p>
                                <?php if($count_message == '0'){
				                    }else{ ?>
                                <span class="badge bg-primary float-right"><?php echo $count_message; ?></span>
                                <?php } ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-masterlist">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Masterlist
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="page.php?page=class" class="nav-link nav-class tree-item">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Class List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="page.php?page=students" class="nav-link nav-students tree-item">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Student List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="page.php?page=teacher" class="nav-link nav-teacher tree-item">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Teacher List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">INFORMATION</li>
                        <li class="nav-item">
                            <a href="page.php?page=gallery&current_page=1" class="nav-link nav-gallery tree-item">
                                <i class="nav-icon fas fa-image"></i>
                                <p>
                                    Plant Gallery
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="page.php?page=about" class="nav-link nav-about tree-item">
                                <i class="nav-icon fas fa-info-circle"></i>
                                <p>
                                    About
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-log-history">
                                <i class="nav-icon fas fa-history"></i>
                                <p>
                                    Log History
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="page.php?page=teacher_log" class="nav-link nav-teacher_log tree-item">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Teacher Log</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="page.php?page=activity_log" class="nav-link nav-activity_log tree-item">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Activity log</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="page.php?page=recycle-student" class="nav-link nav-recycle-student tree-item">
                                <i class="nav-icon fas fa-recycle"></i>
                                <p>
                                    Recycle Bin
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    <script>
    $(document).ready(function() {
        var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'dashboard' ?>';
        var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
        if (s != '')
            page = page + '_' + s;
        if ($('.nav-link.nav-' + page).length > 0) {
            $('.nav-link.nav-' + page).addClass('active')
            if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
                $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
                $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
            }
            if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
                $('.nav-link.nav-' + page).parent().addClass('menu-open')
            }

        }

    })
    </script>