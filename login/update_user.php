<?php
// Incluir archivo de conexión
include '../conexion.php';

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir y validar los datos del formulario
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $image = $_FILES['image'];

    // Verificar si el campo de imagen está seteado y es válido
    if (isset($image) && $image['error'] === 0) {
        // Validar el tamaño de la imagen
        if ($image['size'] > 500000) {
            echo "Lo siento, su archivo es demasiado grande.";
            exit;
        }

        // Validar el tipo de archivo
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($image['type'], $allowedTypes)) {
            echo "Lo siento, solo se permiten archivos JPG y PNG.";
            exit;
        }

        // Leer la imagen y prepararla para actualizar en la base de datos
        $image_tmp = $image['tmp_name'];
        $image_data = file_get_contents($image_tmp);
    } else {
        $image_data = null;
    }

    // Preparar la consulta SQL utilizando consultas preparadas
    $query = "UPDATE users SET ";
    $params = array();

    if (!empty($name)) {
        $query .= "name = ?, ";
        $params[] = $name;
    }
    if (!empty($lastname)) {
        $query .= "lastname = ?, ";
        $params[] = $lastname;
    }
    if (!empty($email)) {
        $query .= "email = ?, ";
        $params[] = $email;
    }
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query .= "password = ?, ";
        $params[] = $hashed_password;
    }
    if ($image_data !== null) {
        $query .= "image = ?, ";
        $params[] = $image_data;
    }

    $query = rtrim($query, ', ') . " WHERE id = ?";
    $params[] = $id;

    $stmt = $conn->prepare($query);

    if ($stmt) {
        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo '<!DOCTYPE html>
            <html lang="es">
            <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Usuario actualizado</title>
              <!-- Incluir SweetAlert2 -->
              <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
            </head>
            <body>
              <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
              <script>
                Swal.fire({
                  title: "¡Usuario actualizado!",
                  text: "El Usuario ha sido actualizado con éxito.",
                  icon: "success",
                  showConfirmButton: false,
                  timer: 1500
                }).then(() => {
                  window.location.href = "usuarios.php";
                });
              </script>
            </body>
            </html>';
            exit;
        } else {
            error_log("Error al actualizar usuario: ". $stmt->error);
            echo 'Error al actualizar usuario: '. $stmt->error;
        }

        $stmt->close();
    } else {
        error_log("Error al preparar la consulta: ". $conn->error);
        echo 'Error al preparar la consulta';
    }

    // Cerrar la conexión
    if (!$conn->close()) {
        error_log("Error al cerrar la conexión: ". $conn->error);
        echo 'Error al cerrar la conexión';
    }
}
?>