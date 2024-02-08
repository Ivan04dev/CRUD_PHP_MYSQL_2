<?php
    // include("config/conection.php");
    require 'includes/conexion.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $consulta = "DELETE FROM usuarios WHERE numeroEmpleado = $id";
        $resultado = mysqli_query($conn, $consulta);

        if(!$resultado) {
            die("Error al eliminar");
        }

        // $_SESSION['alerta'] = "Usuario Eliminado Correctamente";
        // $_SESSION['color'] = 'primary';

        ?>

        <!-- <script  type="text/javascript">
            confirm("¿Deseas eliminar el registro?")
        </script> -->

        <?php



        header("Location: index.php");
    }
?>