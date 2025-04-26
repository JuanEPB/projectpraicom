<?php
// Incluir archivo de conexión
include '../conexion.php';

// Verificar si el ID del producto fue enviado
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Preparar la consulta SQL para eliminar el producto
    $query = "DELETE FROM catalogos WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Mostrar alerta de confirmación con SweetAlert2
        echo '<!DOCTYPE html>
              <html lang="es">
              <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Producto Eliminado</title>
                <!-- Incluir SweetAlert2 -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
              </head>
              <body>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
                <script>
                  Swal.fire({
                    title: "¡Producto eliminado!",
                    text: "El producto ha sido eliminado con éxito.",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500
                  }).then(() => {
                    window.location.href = "dashboard.php";
                  });
                </script>
              </body>
              </html>';
    } else {
        error_log("Error al eliminar producto: " . $stmt->error);
        echo 'Error al eliminar producto: ' . $stmt->error;
    }

    $stmt->close();
} else {
    error_log("Error: ID de producto no válido");
    echo 'Error: ID de producto no válido';
}

// Cerrar la conexión
if (!$conn->close()) {
    error_log("Error al cerrar la conexión: " . $conn->error);
    echo 'Error al cerrar la conexión';
}
?>
