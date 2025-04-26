<?php
include '../conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $conn->query("SELECT * FROM marcas WHERE id = $id");
    $datos = $sql->fetch_object();
    echo json_encode($datos);
}
?>