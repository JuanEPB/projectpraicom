<?php
$servername = "localhost"; 
$username = "Juan"; 
$password = "1234"; 
$database = "praicom"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
die("Conexión fallida: " . $conn->connect_error);
} else {
}
?>