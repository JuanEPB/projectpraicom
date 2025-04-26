<?php
// Incluir archivo de conexión
include '../conexion.php';

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir y validar los datos del formulario
    $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
    $file = $_FILES['file'];

    // Definir el directorio de carga
    $target_dir = "uploads/";

    // Asegurarse de que el directorio exista
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Verificar si el campo de archivo está seteado y es válido
    if (isset($file) && $file['error'] === 0) {
        // Validar el tamaño del archivo
        if ($file['size'] > 40 * 1020 * 1020) { // Tamaño máximo en bytes (500KB)
            echo "Lo siento, su archivo es demasiado grande.";
            exit;
        }

        // Validar el tipo de archivo
        $allowedTypes = ['pdf'];
        $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($fileType, $allowedTypes)) {
            echo "Lo siento, solo se permiten archivos PDF.";
            exit;
        }

        // Definir la ruta completa del archivo
        $target_file = $target_dir . basename($file['name']);

        // Mover el archivo subido al directorio de destino
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            // echo "El archivo ". htmlspecialchars(basename($file['name'])). " se ha subido correctamente.";

            // Preparar la consulta SQL para insertar en la base de datos
            $query = "INSERT INTO catalogos (name, file_name, file_path) VALUES (?,?,?)";
            $stmt = $conn->prepare($query);

            if ($stmt) {
                $file_name = basename($file['name']);
                $file_path = $target_file;
                $stmt->bind_param("sss", $name, $file_name, $file_path);

                // Ejecutar la consulta
                if ($stmt->execute()) {
                    echo '<!DOCTYPE html>
              <html lang="es">
              <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Producto agregado</title>
                <!-- Incluir SweetAlert2 -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
              </head>
              <body>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
                <script>
                  Swal.fire({
                    title: "¡Producto agregado!",
                    text: "El producto ha sido agregado con éxito.",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500
                  }).then(() => {
                    window.location.href = "productos.php";
                  });
                </script>
              </body>
              </html>';
                } else {
                    error_log("Error al agregar producto: ". $stmt->error);
                    echo 'Error al agregar producto: '. $stmt->error;
                }

                $stmt->close();
            } else {
                error_log("Error al preparar la consulta: ". $conn->error);
                echo 'Error al preparar la consulta';
            }
        } else {
            echo "Lo siento, hubo un error al subir tu archivo.";
        }
    } else {
        echo "No se ha subido ningún archivo o ha ocurrido un error.";
    }

    // Cerrar la conexión
    if (!$conn->close()) {
        error_log("Error al cerrar la conexión: ". $conn->error);
        echo 'Error al cerrar la conexión';
    }
}
?>
