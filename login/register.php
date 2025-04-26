<?php
require "../conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($lastname) || empty($email) || empty($password)) {
        echo "Por favor, complete todos los campos";
        exit;
    }

    $query = "SELECT * FROM users WHERE email =?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "El correo electrónico ya existe en la base de datos";
        exit;
    }

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users (name, lastname, email, password) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssss', $name, $lastname, $email, $password_hash);
    if ($stmt->execute()) {
        echo "Usuario registrado con éxito";
    } else {
        echo "Error al registrar usuario: ". $conn->error;
    }
}
?>
