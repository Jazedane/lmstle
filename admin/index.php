<?php include 'header.php'; 
$current_page = $_SERVER['PHP_SELF'];

function determine_active_sidebar_item($pages) {
    $current_page = $_SERVER['PHP_SELF'];
    $active = '';
    foreach ($pages as $page) {
        if ($current_page == $page) {
            $active = 'active';
        }
    }
    return $active;
}
?>

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
            <?php 
                $query= mysqli_query($conn,"SELECT * FROM tbl_teacher WHERE teacher_id = '$session_id'")or die(mysqli_error());
				$row = mysqli_fetch_array($query);
                $is_superadmin = $row['is_superadmin'];

            if ($is_superadmin == false) { ?>
            <a class="brand-link">
                <img src="dist/img/logo.png" alt="BNHS Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Admin/Teacher</span>
            </a>
            <?php
                }
            ?>
            <?php 
                $query= mysqli_query($conn,"SELECT * FROM tbl_teacher WHERE teacher_id = '$session_id'")or die(mysqli_error());
				$row = mysqli_fetch_array($query);
                $is_superadmin = $row['is_superadmin'];

            if ($is_superadmin == true) { ?>
            <a class="brand-link">
                <img src="dist/img/logo.png" alt="BNHS Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Super Admin</span>
            </a>
            <?php
                }
            ?>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <?php $query= mysqli_query($conn,"SELECT * FROM tbl_teacher WHERE teacher_id = '$session_id'")or die(mysqli_error());
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
                        <?php 
                            $query= mysqli_query($conn,"SELECT * FROM tbl_teacher WHERE teacher_id = '$session_id'")or die(mysqli_error());
							$row = mysqli_fetch_array($query);
                            $is_superadmin = $row['is_superadmin'];

                        if ($is_superadmin == false) { ?>
                        <li class="nav-item">
                            <a href="new-dashboard.php"
                                class="nav-link <?php echo determine_active_sidebar_item(['/lmstlee4/admin/new-dashboard.php']) ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                        <?php 
                            $query= mysqli_query($conn,"SELECT * FROM tbl_teacher WHERE teacher_id = '$session_id'")or die(mysqli_error());
							$row = mysqli_fetch_array($query);
                            $is_superadmin = $row['is_superadmin'];

                        if ($is_superadmin == true) { ?>
                        <li class="nav-item">
                            <a href="dashboard.php"
                                class="nav-link <?php echo determine_active_sidebar_item(['/lmstlee4/admin/dashboard.php']) ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                        <li class="nav-item">
                            <a href="class_main.php"
                                class="nav-link <?php echo determine_active_sidebar_item(['/lmstlee4/admin/class_main.php']) ?>">
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
                            <a href="notification.php"
                                class="nav-link <?php echo determine_active_sidebar_item(['/lmstlee4/admin/notification.php']) ?>">
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
                            <a href="message.php"
                                class="nav-link <?php echo determine_active_sidebar_item(['/lmstlee4/admin/message.php', '/lmstlee4/admin/sent_message.php']) ?>">
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
                            <a href="#" class="nav-link <?php echo determine_active_sidebar_item(['/lmstlee4/admin/class.php','/lmstlee4/admin/students.php',
                            '/lmstlee4/admin/teacher.php','/lmstlee4/admin/edit_class.php','/lmstlee4/admin/edit_student.php','/lmstlee4/admin/edit_teacher.php',
                            '/lmstlee4/admin/activate-student.php','/lmstlee4/admin/deactivate-student.php','/lmstlee4/admin/new-class.php','/lmstlee4/admin/new-students.php'
                            ,'/lmstlee4/admin/edit-new-class.php','/lmstlee4/admin/edit-new-student.php']) ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Masterlist
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php 
                                $query= mysqli_query($conn,"SELECT * FROM tbl_teacher WHERE teacher_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
                                $is_superadmin = $row['is_superadmin'];

                                if ($is_superadmin == false) { ?>
                                <li class="nav-item">
                                    <a href="new-class.php"
                                        class="nav-link <?php echo determine_active_sidebar_item(['/lmstlee4/admin/new-class.php','/lmstlee4/admin/edit-new-class.php']) ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Class List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="new-students.php"
                                        class="nav-link <?php echo determine_active_sidebar_item(['/lmstlee4/admin/new-students.php','/lmstlee4/admin/edit-new-student.php']) ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Student List</p>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>
                                <?php 
                                $query= mysqli_query($conn,"SELECT * FROM tbl_teacher WHERE teacher_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
                                $is_superadmin = $row['is_superadmin'];

                                if ($is_superadmin == true) { ?>
                                <li class="nav-item">
                                    <a href="class.php"
                                        class="nav-link <?php echo determine_active_sidebar_item(['/lmstlee4/admin/class.php','/lmstlee4/admin/edit_class.php']) ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Class List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="students.php"
                                        class="nav-link <?php echo determine_active_sidebar_item(['/lmstlee4/admin/students.php','/lmstlee4/admin/edit_student.php']) ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Student List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="teacher.php"
                                        class="nav-link <?php echo determine_active_sidebar_item(['/lmstlee4/admin/teacher.php', 
                                    '/lmstlee4/admin/activate-teacher.php', '/lmstlee4/admin/deactivate-teacher.php', '/lmstlee4/admin/edit_teacher.php']) ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Teacher List</p>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-header">INFORMATION</li>
                        <li class="nav-item">
                            <a href="gallery.php?current_page=1"
                                class="nav-link <?php echo determine_active_sidebar_item(['/lmstlee4/admin/gallery.php']) ?>">
                                <i class="nav-icon fas fa-image"></i>
                                <p>
                                    Plant Gallery
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link <?php echo determine_active_sidebar_item(['/lmstlee4/admin/teacher_log.php','/lmstlee4/admin/activity_log.php']) ?>">
                                <i class="nav-icon fas fa-history"></i>
                                <p>
                                    Log History
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="teacher_log.php"
                                        class="nav-link <?php echo determine_active_sidebar_item(['/lmstlee4/admin/teacher_log.php']) ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Teacher Log</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="activity_log.php"
                                        class="nav-link <?php echo determine_active_sidebar_item(['/lmstlee4/admin/activity_log.php']) ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Activity log</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <?php 
                                $query= mysqli_query($conn,"SELECT * FROM tbl_teacher WHERE teacher_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
                                $is_superadmin = $row['is_superadmin'];

                            if ($is_superadmin == false) { ?>
                            <a href="new-recycle-student.php"
                                class="nav-link <?php echo determine_active_sidebar_item(['/lmstlee4/admin/new-recycle-student.php',
                            '/lmstlee4/admin/new-recycle-class.php','/lmstlee4/admin/new-recycle-student-task.php', '/lmstlee4/admin/new-recycle-teacher-task.php']) ?>">
                                <i class="nav-icon fas fa-recycle"></i>
                                <p>
                                    Recycle Bin
                                </p>
                            </a>
                            <?php
                                }
                            ?>
                            <?php 
                                $query= mysqli_query($conn,"SELECT * FROM tbl_teacher WHERE teacher_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
                                $is_superadmin = $row['is_superadmin'];

                            if ($is_superadmin == true) { ?>
                            <a href="recycle-student.php" class="nav-link <?php echo determine_active_sidebar_item(['/lmstlee4/admin/recycle-student.php',
                            '/lmstlee4/admin/recycle-teacher.php','/lmstlee4/admin/recycle-class.php','/lmstlee4/admin/recycle-student-task.php',
                            '/lmstlee4/admin/recycle-teacher-task.php']) ?>">
                                <i class="nav-icon fas fa-recycle"></i>
                                <p>
                                    Recycle Bin
                                </p>
                            </a>
                            <?php
                                }
                            ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>