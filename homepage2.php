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
                        <a href="change_password_student.php" class="dropdown-item">
                            <i class="fas fa-edit"> Change Password</i>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="change-avatar-student.php" class="dropdown-item">
                            <i class="fas fa-edit"> Change Avatar</i>
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
            <a class="brand-link">
                <img src="dist/img/logo.png" alt="BNHS Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Student</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <?php $query= mysqli_query($conn,"select * from tbl_student where student_id = '$session_id'")or die(mysqli_error());
								  $row = mysqli_fetch_array($query);
						?>
                    <div class="image">
                        <img id="avatar" src="admin/<?php echo $row['location']; ?>" class="img-circle elevation-2" alt="User Image">
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
                            <a href="class_main.php" class="nav-link">
                                <i class="nav-icon fas fa-arrow-left"></i>
                                <p>
                                    Back
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="my_classmates.php<?php echo '?id='.$get_id; ?>" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    My Classmates
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="progress.php<?php echo '?id='.$get_id; ?>" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Progress
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="task_student.php<?php echo '?id='.$get_id; ?>" class="nav-link">
                                <i class="nav-icon fas fa-file-upload"></i>
                                <p>
                                    Activity Update
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