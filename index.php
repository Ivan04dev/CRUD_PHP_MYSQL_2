<?php
    require 'includes/conexion.php';
    // session_start();
    require 'includes/helpers.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD Usuarios</title>
  </head>
  <body>
    <div class="container-xl">
        <div class="row">
        <div class="col-md-4">
            <?php if(isset($_SESSION['errores'])): ?>
                <!-- <?php # var_dump($_SESSION['errores']); ?> -->
            <?php endif; ?>
            <h2>Crear</h2>
            <?php if(isset($_SESSION['registro'])) : ?>
                <div class="alert alert-success">
                    <?=$_SESSION['registro'] ?>
                </div>
            <?php elseif(isset($_SESSION['errores']['general'])): ?>
                <div class="alert alert-danger">
                    <?=$_SESSION['errores']['general'] ?>
                </div>
            <?php endif; ?>
            <form action="registrar.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre: </label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
                </div>
                <div class="mb-3">
                    <label for="apellidoPaterno" class="form-label">Apellido Paterno: </label>
                    <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidoPaterno') : ''; ?>
                </div>
                <div class="mb-3">
                    <label for="apellidoMaterno" class="form-label">Apellido Materno: </label>
                    <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidoMaterno') : ''; ?>
                </div>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario: </label>
                    <input type="text" class="form-control" name="usuario" id="usuario">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'usuario') : ''; ?>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo:</label>
                    <input type="email" class="form-control" name="correo" id="correo">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'correo') : ''; ?>
                </div>
                <input class="btn btn-success" type="submit" name="submit" value="Guardar">
            </form>
            <?php borrarErrores(); ?>
        </div>
        <div class="col-md-8">
            <h2>Tabla</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No. Empleado</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Usuario</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM usuarios";
                        $usuarios = mysqli_query($conn, $query);
                        while($dato = mysqli_fetch_array($usuarios)){  ?>
                            <tr>
                                <td><?php echo $dato['numeroEmpleado'] ?></td>
                                <td><?php echo $dato['nombre'] ?></td>
                                <td><?php echo $dato['apellidoPaterno'] ?></td>
                                <td><?php echo $dato['apellidoMaterno'] ?></td>
                                <td><?php echo $dato['usuario'] ?></td>
                                <td><?php echo $dato['correo'] ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo $dato['numeroEmpleado']?>" class="btn btn-outline-primary btn-sm mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />  
                                        </svg>  
                                    </a>
                                    <a href="delete.php?id=<?php echo $dato['numeroEmpleado']?>" class="btn btn-outline-danger btn-sm mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>  
                                    </a>
                                </td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

