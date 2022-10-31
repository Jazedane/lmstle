<?php include 'header.php'; ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/logo.png" alt="BNHS Logo" height="60" width="60">
        </div>

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
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-cog fa-spin"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Settings</span>
                        <div class="dropdown-divider"></div>
                        <a href="profile.php" class="dropdown-item">
                            <i class="fas fa-user-circle"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="change_password.php" class="dropdown-item">
                            <i class="fas fa-edit"> Change Password</i>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="developer.php" class="dropdown-item">
                            <i class="fas fa-users"></i> Developer
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="logout.php" class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
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
            <a href="index.html" class="brand-link">
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

                        <li class="nav-item menu-open">
                            <a href="dashboard.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="class_main.php" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Class
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="notification.php" class="nav-link">
                                <i class="nav-icon fas fa-bell"></i>
                                <p>
                                    Notification
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="message.php" class="nav-link">
                                <i class="nav-icon fas fa-comments"></i>
                                <p>
                                    Message
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Masterlist
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="class.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Class</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="students.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Students</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="teacher.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Teacher</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">TASKS</li>
                        <li class="nav-item">
                            <a href="add_assignment.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Add Assignment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add_task.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Add Activity</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add_project.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Add Project</p>
                            </a>
                        </li>
                        <li class="nav-header">INFORMATION</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-history"></i>
                                <p>
                                    Log History
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="teacher_log.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Teacher Log</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="activity_log.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Activity log</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="calendar.php" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Calendar
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="gallery.php" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Gallery
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="about.php" class="nav-link">
                                <i class="nav-icon fas fa-info-circle"></i>
                                <p>
                                    About
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.content -->
            </div>
        </aside>
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>

    <!-- /.control-sidebar -->
    <!-- ./wrapper -->

    <!-- jQuery -->