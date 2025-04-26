<?php
// Incluir archivo de conexión
include '../conexion.php';

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir y validar los datos del formulario
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Encriptar la contraseña
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Verificar si el campo de imagen está seteado y es válido
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image = $_FILES['image'];

        // Validar el tamaño de la imagen
        if ($image['size'] > 500000) {
            echo "Lo siento, su archivo es demasiado grande.";
            exit;
        }

        // Validar el tipo de archivo
        $allowedTypes = ['image/jpeg', 'image/png'];
        if (!in_array($image['type'], $allowedTypes)) {
            echo "Lo siento, solo se permiten archivos JPG y PNG.";
            exit;
        }

        // Leer la imagen y prepararla para guardarla en la base de datos
        $image_data = file_get_contents($image['tmp_name']);
    } else {
        $image_data = null;
    }

    // Preparar la consulta SQL usando consultas preparadas
    $query = "INSERT INTO users (name, lastname, email, password, image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        if ($image_data) {
            // Si hay imagen, bindear con b para binario
            $stmt->bind_param('sssss', $name, $lastname, $email, $password_hash, $image_data);
        } else {
            // Si no hay imagen, bindear con s para null (o ajustar la base de datos para aceptar nulos)
            $stmt->bind_param('ssssb', $name, $lastname, $email, $password_hash, $null);
            $stmt->send_long_data(4, null);
        }

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo '<!DOCTYPE html>
              <html lang="es">
              <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Usuario agregado</title>
                <!-- Incluir SweetAlert2 -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
              </head>
              <body>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
                <script>
                  Swal.fire({
                    title: "¡Usuario agregado!",
                    text: "El Usuario ha sido agregado con éxito.",
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
            echo 'Error al agregar usuario: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        echo 'Error al preparar la consulta: ' . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
