<?php
$connect = mysqli_connect("localhost", "root", "", "lmstlee4");

if(isset($_POST['import'])){
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                $class_id = $_POST['class_id'];
    $teacher_id = $_POST['teacher_id'];

    $query = "SELECT * FROM tbl_teacher_class WHERE teacher_id = '$teacher_id' AND class_id='$class_id';";
    $result = mysqli_query($conn, $query);
    $row   = mysqli_fetch_assoc($result);
    $teacher_class_id = $row['teacher_class_id'];
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $username   = $line[0];
                $firstname  = $line[1];
                $middlename  = $line[2];
                $lastname = $line[3];
                $gender = $line[4];
                $age = $line[5];
                $hashedPassword = hash('sha256', $lastname. $username);
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT student_id FROM tbl_student WHERE username = '".$line[0]."'";
                $prevResult = $db->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $db->query("UPDATE tbl_student SET firstname = '".$firstname."', middlename = '".$middlename."', lastname = '".$middlename."',  WHERE username = '".$username."'");
                }else{
                    // Insert member data in the database
                    $db->query("INSERT INTO tbl_student (class_id, username, firstname, middlename, lastname, gender, age, location, status, password) VALUES ('".$class_id."', '".$username."', '".$firstname."', '".$middlename."', '".$lastname."', '".$gender."', '".$age."', 'NO-IMAGE-AVAILABLE.jpg', 'Registered', '".$hashedPassword."')");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header("Location: students.php".$qstring);

?>