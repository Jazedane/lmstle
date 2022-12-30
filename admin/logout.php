<?php
include('database.php');
include('session.php');

session_destroy();
header('location:/lmstlee4/index.php'); 
?>