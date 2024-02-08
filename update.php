<?php
    // include("config/conection.php");
    require 'includes/conexion.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $consulta = "SELECT * FROM usuarios WHERE numeroEmpleado = $id";
        $resultado = mysqli_query($conn, $consulta);
        if(mysqli_num_rows($resultado) == 1) {
           $fila = mysqli_fetch_array($resultado);
           $nombre = $fila['nombre'];
           $apellidoPaterno = $fila['apellidoPaterno'];
           $apellidoMaterno = $fila['apellidoMaterno'];
           $usuario = $fila['usuario'];
           $correo = $fila['correo'];
        }
    }

    if(isset($_POST['actualizar'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $apellidoPaterno = $_POST['apellidoPaterno'];
        $apellidoMaterno = $_POST['apellidoMaterno'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['correo'];

        // echo $nombre;
        // echo $apellidoPaterno;
        // echo $apellidoMaterno;
        // echo $usuario;
        // echo $correo;

        $consulta = "UPDATE usuarios SET nombre='$nombre', apellidoPaterno='$apellidoPaterno', apellidoMaterno='$apellidoMaterno', usuario='$usuario', correo='$correo' WHERE numeroEmpleado = '$id'";
        $resultado = mysqli_query($conn, $consulta);

        if(!$resultado) {
            die("Error al actualizar");
        }

        // echo "Datos Guardados Correctamente";

        // $_SESSION['alerta'] = 'Usuario actualizado correctamente';
        // $_SESSION['color'] = 'success';

        header("Location: index.php");
    }
?>

<!-- <?php # include("includes/header.php") ?> -->

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
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <form action="update.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group my-2">
                            <label for="nombre">Nombre:</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre:" value="<?php echo $nombre; ?>" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="apellidoPaterno">Apellido Paterno:</label>
                            <input class="form-control" type="text" name="apellidoPaterno" id="apellidoPaterno" placeholder="Tu Apellido Paterno" value="<?php echo $apellidoPaterno; ?>" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="apellidoMaterno">Apellido Materno:</label>
                            <input class="form-control" type="text" name="apellidoMaterno" id="apellidoMaterno" placeholder="Tu Apellido Materno:" value="<?php echo $apellidoMaterno; ?>" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="usuario">Usuario:</label>
                            <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Tu Usuario:" value="<?php echo $usuario; ?>" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="correo">Correo:</label>
                            <input class="form-control" type="email" name="correo" id="correo" placeholder="Tu Correo:" value="<?php echo $correo; ?>" required>
                        </div>

                        <input class="btn btn-success btn-block" type="submit" name="actualizar" value="Actualizar">
                    </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
<!-- <?php # include("includes/footer.php") ?> -->