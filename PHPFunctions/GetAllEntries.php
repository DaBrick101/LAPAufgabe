<?php 

require_once 'db.php';

function GetAllUser_data(){
    global $conn;
    $query = "SELECT * from benutzer";
    $result = mysqli_query($conn,$query);
    return $result;
}



?>