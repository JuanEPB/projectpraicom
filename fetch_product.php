<?php
$servername = "localhost"; 
$username = "Juan"; 
$password = "1234"; 
$database = "praicom"; 

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id, name, description, image, price FROM productos LIMIT 3";
$result = $conn->query($sql);

$productos = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

$conn->close();
?>
