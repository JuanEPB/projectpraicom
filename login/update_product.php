<?php
// Incluir archivo de conexión
include '../conexion.php';

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir y validar los datos del formulario
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $file = $_FILES['file']; // Renombrado para reflejar el campo del formulario

    // Definir el directorio de carga
    $target_dir = "uploads/";

    // Asegurarse de que el directorio exista
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Inicializar variables para el archivo
    $file_name = null;
    $file_path = null;
    $file_update = false;

    // Obtener el archivo actual de la base de datos
    $query = "SELECT file_path FROM catalogos WHERE id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        error_log("Error al preparar la consulta para obtener el archivo actual: " . $conn->error);
        die('Error al preparar la consulta');
    }
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($current_file_path);
    if ($stmt->fetch()) {
        $file_path = $current_file_path;
    }
    $stmt->close();

    // Verificar si se ha proporcionado un nuevo archivo
    if (isset($file) && $file['error'] === 0) {
        // Validar el tamaño del archivo
        if ($file['size'] > 40 * 1024 * 1024) { // Tamaño máximo en bytes (40MB)
            echo "Lo siento, su archivo es demasiado grande. El tamaño máximo permitido es 40MB.";
            exit;
        }

        // Validar el tipo de archivo
        $allowedTypes = ['pdf'];
        $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($fileType, $allowedTypes)) {
            echo "Lo siento, solo se permiten archivos PDF.";
            exit;
        }

        // Definir la ruta completa del nuevo archivo
        $file_name = basename($file['name']);
        $target_file = $target_dir . $file_name;

        // Mover el archivo subido al directorio de destino
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            $file_path = $target_file;
            $file_update = true;
        } else {
            echo "Lo siento, hubo un error al subir el archivo.";
            exit;
        }
    }

    // Preparar la consulta SQL utilizando consultas preparadas
    $query = "UPDATE catalogos SET name = ?";
    $params = array($name);
    $types = 's';

    if ($file_update) {
        $query .= ", file_name = ?, file_path = ?";
        $params[] = $file_name;
        $params[] = $file_path;
        $types .= 'ss';
    }

    $query .= " WHERE id = ?";
    $params[] = $id;
    $types .= 'i';

    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        error_log("Error al preparar la consulta de actualización: " . $conn->error);
        die('Error al preparar la consulta');
    }

    $stmt->bind_param($types, ...$params);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo '<!DOCTYPE html>
              <html lang="es">
              <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Producto actualizado</title>
                <!-- Incluir SweetAlert2 -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
              </head>
              <body>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
                <script>
                  Swal.fire({
                    title: "¡Producto actualizado!",
                    text: "El producto ha sido actualizado con éxito.",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500
                  }).then(() => {
                    window.location.href = "productos.php";
                  });
                </script>
              </body>
              </html>';
        exit;
    } else {
        error_log("Error al actualizar producto: " . $stmt->error);
        echo 'Error al actualizar producto: ' . $stmt->error;
    }

    $stmt->close();

    // Cerrar la conexión
    if (!$conn->close()) {
        error_log("Error al cerrar la conexión: " . $conn->error);
        echo 'Error al cerrar la conexión';
    }
}
?>
r