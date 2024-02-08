<?php

if(isset($_POST)){
    require 'includes/conexion.php';
    session_start();

    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    // var_dump($_POST);

    $errores = array();

    if(!empty($nombre) && !is_numeric($nombre)){
        $campoNombre = true;
    } else {
        $campoNombre = false;
        $errores['nombre'] = "El campo nombre no es válido";
    }

    if(!empty($apellidoPaterno) && !is_numeric($apellidoPaterno)){
        $campoApellidoPaterno = true;
    } else {
        $campoApellidoPaterno = false;
        $errores['apellidoPaterno'] = "El campo Apellido Paterno no es válido";
    }

    if(!empty($apellidoMaterno) && !is_numeric($apellidoMaterno)){
        $campoApellidoMaterno = true;
    } else {
        $campoApellidoMaterno = false;
        $errores['apellidoMaterno'] = "El campo Apellido Materno no es válido";
    }

    if(!empty($usuario) && !is_numeric($usuario)){
        $campoUsuario = true;
    } else {
        $campoUsuario = false;
        $errores['usuario'] = "El campo Usuario no es válido";
    }

    if(!empty($correo) && filter_var($correo, FILTER_VALIDATE_EMAIL)){
        $campoCorreo = true;
    } else {
        $campoCorreo = false;
        $errores['correo'] = "El campo Correo no es válido";
    }

    // var_dump($errores);

    
    $guardarUsuario = false;

    // Comprueba si existen errores 
    // if(count($errores == 0)){
    if(empty($errores)){
        $guardarUsuario = true;
        // Insertar en la DB 
        $sql = "INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, usuario, correo) VALUES('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$usuario', '$correo');";
        $query = mysqli_query($conn, $sql);
        if($guardarUsuario){
            $_SESSION['registro'] = "El usuario se ha insertado correctamente";
        } else {
            $_SESSION['errores']['general'] = "Error al isertar el usuario";
        }
    } else {
        $_SESSION['errores'] = $errores;
    }
    
    // $guardarUsuario = false;
    // if($errores){
    //     $_SESSION['errores'] = $errores;
    //     header('Location: index.php');
    // } else {
    //     $guardarUsuario = true;
    // }
}

header('Location: index.php');