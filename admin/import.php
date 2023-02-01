<?php

require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
require('database.php');

if(isset($_POST['import'])){

  $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
  if(in_array($_FILES["file"]["type"],$mimes)){

    $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

    $Reader = new SpreadsheetReader($uploadFilePath);

      foreach ($Reader as $Row)
      {
        $username = $Row[0];
        $firstname = $Row[1];
        $middlename = $Row[2];
        $lastname = $Row[3];
        $gender = $Row[4];
        $age = $Row[5];

        $query = "insert into tbl_student(username,firstname,middlename,lastname,gender,age) values('".$username."','".$firstname."',
        '".$middlename."','".$lastname."','".$gender."','".$age."')";

        $mysqli->query($query);
       }
    }
    echo "<br />Data Inserted in dababase";
  }else { 
    die("<br/>Sorry, File type is not allowed. Only Excel file."); 
  }
?>