<?php

    function mostrarError($errores, $campo){
        $alert = '';
        if(isset($errores[$campo]) && !empty($campo)){
            $alert = "<div class='alert alert-danger'>".$errores[$campo].'</div>';
        }

        return $alert;
    }

    function borrarErrores(){
        $borrado = false;

        if(isset($_SESSION['errores'])){
            $_SESSION['errores'] = null;
            // $borrado = session_unset($_SESSION['errores']);
            $borrado = session_unset();
        }

        if(isset($_SESSION['registro'])){
            $_SESSION['registro'] = null;
            session_unset();
        }

        return $borrado;
    }