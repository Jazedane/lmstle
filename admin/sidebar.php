<style media="screen">
* {
    font-family: 'Georgia';
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    list-style: none;
    text-decoration: none;
}

body {
    background: #f5f5f5;
}

.top_navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 60px;
    background-image: linear-gradient(to bottom, yellowgreen, green);
    box-shadow: 1px 0 2px rgba(0, 0, 0, 0.125);
    display: flex;
    align-items: center;
    color: white;
}

.top_navbar .logo {
    width: 220px;
    font-size: 25px;
    font-weight: 700;
    padding: 0 25px;
    color: white;
    letter-spacing: 2px;
    text-transform: uppercase;
}



.top_navbar .menu {
    width: calc(100% - 250px);
    padding: 0 25px;
    display: flex;
    justify-content: space-between;
    align: right;
    font-size: 16px;
    cursor: pointer;
    color: white;
}

.sidebar {
    position: fixed;
    top: 60px;
    left: 0;
    width: 180px;
    height: 100%;
    background: #042331;
}

.sidebar ul li a {
    display: block;
    padding: 17px 35px;
    border-bottom: 1px solid #03374e;
    width: 180px;
    color: white;
}

.sidebar ul li a .icon {
    font-size: 18px;
    font-color: white;
    vertical-align: middle;

}

.sidebar ul li a .text {
    margin-left: 19px;
    font-color: white;
    font-family: Georgia;
    font-size: 16px;
    letter-spacing: 1px;
}

.sidebar ul li a:hover {
    background-image: linear-gradient(to bottom, yellowgreen, green);
    color: black;
    width: 180px;
    height: 100%;
}

.dropdown ul li a:hover {
    background-image: linear-gradient(to bottom, yellowgreen, green);
    color: black;
    height: 100%;
}
</style>
<?php include('header.php'); ?>

<div class="top_navbar">
    <div class="logo"> TEACHER </div><img class="rounded mx-auto d-block" src="images/logo.png" style="width: 3rem">
    <div class="menu">
        <div class="pull-right"></div>
        <?php $query= mysqli_query($conn,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
								  $row = mysqli_fetch_array($query);
						?>
        <li class="dropdown">
            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i
                    class="fa-solid fa-user-circle fa-xl"></i>
                <?php echo $row['firstname']." ".$row['lastname'];  ?> <i class="caret"></i>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="change_password_teacher.php"><i class="fa-solid fa-circle"></i> Change Password</a>
                    <a tabindex="-1" href="avatar_modal.php"><i class="fa-solid fa-image-portrait"></i>
                        Change Avatar</a>
                    <a tabindex="-1" href="profile_teacher.php"><i class="fa-solid fa-user"></i> Profile</a>
                    <a tabindex="-1" href="logout.php"><i class="fa-solid fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </li>
    </div>
</div>
<div class="sidebar">
    <center><img id="avatar" src="/lmstle/admin/uploads/<?php echo $row['location']; ?>"
            class="rounded mx-auto d-block">
        <div class="" style="color:white"><?php echo $row['firstname']." ".$row['lastname'];  ?></div>
    </center>
    <ul class="nav nav-pills nav-sidebar flex-column nav-flat" role="menu" data-accordion="false" data
        widget="treeview">
        <li class="nav-item">
            <a href="admin_dashboard.php">
                <i class="fa-solid fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="">
            <a href="dashboard_teacher.php">
                <i class="fa-solid fa-home"></i> Class</a>
        </li>
        <li class="">
            <a href="notification_teacher.php">
                <i class="fa-solid fa-bell"></i> Notification
            </a>
        </li>
        <?php
			$message_query = mysqli_query($conn,"select * from message where receiver_id = '$session_id' and message_status != 'read' ")or die(mysqli_error());
			$count_message = mysqli_num_rows($message_query);
		?>
        <li class="">
            <a href="teacher_message.php"><i class="fa-solid fa-envelope"></i> Message
                <?php if($count_message == '0'){
				}else{ ?>
                <span class="badge badge-important"><?php echo $count_message; ?></span>
                <?php } ?>
            </a>
        </li>
        <li class="">
            <a href="plants_info.php">
                <i class="fa-solid fa-plant-wilt"></i> Plants Information</a>
        </li>
        <li class="dropdown">
            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i
                    class="fa-solid fa-user-group"></i> Masterlist <i class="caret"></i>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="class.php"><i class="fa-solid fa-plus-circle"></i> Class</a>
                </li>
                <li>
                    <a href="students.php"><i class="fa-solid fa-plus-circle"></i> Students</a>
                </li>
                <li>
                    <a href="add_task.php"><i class="fa-solid fa-plus-circle"></i> Task</a>
                </li>
                <li class="">
                    <a href="admin_user.php"><i class="fa-solid fa-user-gear"></i> Admin</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa-solid fa-history">
                </i> Log History<i class="caret"></i>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="user_log.php"><i class="fa-solid fa-user-check"></i> Teacher Log</a>
                </li>
                <li>
                    <a href="activity_log.php"><i class="fa-solid fa-list-check"></i> Activity Log</a>
                </li>
            </ul>
        </li>
    </ul>
    <?php include('search_other_class.php'); ?>
</div>