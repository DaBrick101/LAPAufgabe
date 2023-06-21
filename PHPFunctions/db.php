<!-- Stellt verbindung zu DB her und überprüft diese-->
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lapuebungmockdata";

// Create connection
$conn = new mysqli($servername, $username,$password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>