<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header('Location: login.html');
  exit;
}

// Código de la página dashboard.php
?>
<?php
include '../conexion.php';

$id = $_GET['id'];
$sql = $conn->query("SELECT * FROM users WHERE id = $id");
$data = $sql->fetch_object();

// Mostrar el formulario de edición con los datos del usuario
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="../css/edit.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <img src="../img/logo.png" width="100"/>
                        <h2 class="card-title">Actualizar Perfil</h2>
                        <hr>
                        <form action="update_user.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" id="name" name="name" value="<?= htmlspecialchars($data->name)?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Apellido:</label>
                                <input type="text" id="lastname" name="lastname" value="<?= htmlspecialchars($data->lastname)?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo electrónico:</label>
                                <input type="email" id="email" name="email" value="<?= htmlspecialchars($data->email)?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirmar contraseña:</label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="photo">Foto:</label>
                                <input type="file" name="image" id="imgInput">
                                <i class="bi bi-plus-circle-dotted"></i> Subir Foto
                                </label>
                            </div>
                            <input type="hidden" name="id" value="<?= htmlspecialchars($data->id)?>">
                            <button  type="submit" class="btn btn-primary btn-block">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>