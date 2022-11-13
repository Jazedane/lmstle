<?php
    require_once('./config/operations.php');
    $mysqli = new mysqli('localhost','root','','lmstlee4');
    if($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

$db = new Operations(); 
                  
 $mysqli->close();
?>