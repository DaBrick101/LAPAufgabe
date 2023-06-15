<?php 

require_once 'db.php';

function GetAllUser_data(){
    global $conn;
    $query = "SELECT * from persons";
    $result = mysqli_query($conn,$query);
    return $result;
}


?>