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

<?php include 'header.php'; ?>

<div class="top_navbar">
    <div class="logo"> STUDENT </div>
    <div class="menu">
        <div class="pull-right"></div>
        <?php
        ($query = mysqli_query(
            $conn,
            "select * from student where student_id = '$session_id'"
        )) or die(mysqli_error());
        $row = mysqli_fetch_array($query);
        ?>
        <li class="dropdown">
            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa-solid fa-user-circle fa-xl"></i>
                <?php echo $row['firstname'] . ' ' . $row['lastname']; ?> <i class="caret"></i>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="change_password_student.php"><i class="fa-solid fa-circle"></i> Change Password</a>
                    <a tabindex="-1" href="avatar_modal_student.php"><i class="fa-solid fa-image-portrait"></i>
                        Change Avatar</a>
                    <a tabindex="-1" href="index.php"><i class="fa-solid fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </li>
    </div>
</div>

<div class="sidebar">
    <img id="avatar" src="/lmstle/admin/<?php echo $row[
        'location'
    ]; ?>" class="img-polaroid" style="width:140px;height:140;margin-left:20px">
    <ul class="nav nav-pills nav-sidebar flex-column nav-flat" role="menu" data-accordion="false" data
        widget="treeview">
        <li class="nav-item">
            <a href="dashboard_student.php">
                <i class="fa-solid fa-school"></i> My Class</a>
        </li>
        <li class="nav-item">
            <a href="student_notification.php">
                <i class="fa-solid fa-info-circle"></i> Notification</a>
        </li>
        <li class="nav-item">
            <a href="student_message.php">
                <i class="fa-solid fa-envelope"></i> Message</a>
        </li>
        <li class="">
            <a href="plants_info.php">
                <i class="fa-solid fa-info-circle"></i> Plants Information</a>
        </li>
    </ul>
</div>