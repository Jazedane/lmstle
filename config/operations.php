<?php
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

//login username and password
    class Operations extends dbconfig{


        public function get_up($id){
            global $db;

            $query = "SELECT * from tbl_student where student_id = $id";
            $data = mysqli_query($db->connection,$query);
            return $data;
        }
    }
?>