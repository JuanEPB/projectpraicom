<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header('Location: login.html');
  exit;
}

// Código de la página dashboard.php
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../css/dashboard.css" rel="stylesheet" />
        <link href="../css/crud.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css">
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script>
        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href=""><img src="../img/LOGOD.png" width="200"/></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>

                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menú</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Tablas</div>
                            <a class="nav-link" href="productos.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Catalogos
                            </a>
                            <a class="nav-link" href="usuarios.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Usuarios
                            </a>
                            <a class="nav-link" href="marca.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Marcas
                            </a>
                            <div class="sb-sidenav-footer">
                                <div class="small">Sesion iniciada</div>
                                <p>Usuario: <?php echo $_SESSION['user_name'];?></p>
                            </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Bienvenido <?php echo $_SESSION['user_name'];?></li>
                        </ol>
                    

<div class="card mb-4">
<div class="card-header">
        <i class="fas fa-table me-1"></i>
        Marcas     <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#userForm">Nueva Marca <i class="bi bi-box"></i></button>
    </div>
    <div class="card-body">
    <table class="table datatables-simple" id="datatablesSimple2">
        <thead>
            <tr>
                <th>Id</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="data">
            <?php
            include '../conexion.php';
            $sql = $conn->query("SELECT * FROM marcas");

            while ($datos = $sql->fetch_object()) {
                // Verificar el tipo MIME de la imagen y codificar en base64
                $imageType = 'image/jpeg'; // Cambiar según el tipo real de la imagen almacenada
                if ($datos->image) {
                    $imageSrc = "data:$imageType;base64," . base64_encode($datos->image);
                } else {
                    $imageSrc = './image/default-image.png'; // Imagen por defecto si no hay imagen en la base de datos
                }
            ?>
                <tr>
                    <td><?= htmlspecialchars($datos->id) ?></td>
                    <td><img src="<?= htmlspecialchars($imageSrc) ?>" width="100" alt="User Image"></td>
                    <td><?= htmlspecialchars($datos->name) ?></td>
                    <td>
                    <a href="edit_marca.php?id=<?= htmlspecialchars($datos->id)?>" class="btn btn-warning">Editar<i class="bi bi-pen"></i></a>
                    <button class="btn btn-danger" onclick="location.href='delete_marca.php?id=<?= htmlspecialchars($datos->id)?>'">Borrar<i class="bi bi-trash"></i></button>                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Modal para agregar nuevo usuario -->
<div class="modal fade" id="userForm">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-light">
            <div class="modal-header bg-secondary">
                <h4 class="modal-title">Nueva Marca</h4>
                <img src="../img/LOGOD.png" alt="" width="100" height="100" class="img-fluid" >

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="add_marca.php" method="POST" id="myForm" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card imgholder text-center">
                        <label for="imgInput" class="upload">
                            <input type="file" name="image" id="imgInput">
                            <i class="bi bi-plus-circle-dotted"></i> Subir Foto
                        </label>
                        <img src="./img/logo.png" alt="" width="200" height="200" class="img-fluid">
                        </div>
                    <div class="inputField row">
                        <div class="col-md-6">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" id="name" required class="form-control">
                        </div>
                    </div>
        </div>
        </div>
        <div class="row">

                    <div class="text-center">
                        <button class="btn btn-success" id="saveButton" onclick="location.href='add_marca.php?'">Guardar</button>
                        <button class="btn btn-danger" id="cancelButton" onclick="location.href='marca.php'">Cancelar</button>
                    </div>
        </div>
                </form>
            </div>
        </div>
    </div>
</div>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">&copy; PRAICOM <script>new Date().getFullYear()>2010&&document.write(""+new Date().getFullYear());</script>.
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script>
window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }

    const datatablesSimple2 = document.getElementById('datatablesSimple2');
    if (datatablesSimple2) {
        new simpleDatatables.DataTable(datatablesSimple2);
    }
    const datatablesSimple3 = document.getElementById('datatablesSimple3');
    if (datatablesSimple3) {
        new simpleDatatables.DataTable(datatablesSimple3);
    }
});
</script>
    </body>
</html>
