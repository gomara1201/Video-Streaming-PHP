<?php
    require("./../../seguridad/videoStreaming/src/classes/VideosBD.class.php");
    require("./../../seguridad/videoStreaming/src/classes/Funciones.class.php");
    require("./../../seguridad/videoStreaming/src/classes/Pantalla.class.php");



    /*
     *  Comprobar que NO hay una sesión iniciada
     */
    $funciones = new Funciones();
    $funciones -> iniciarSesion();
    $usuario = "";    
    if ($funciones -> validarSesion($usuario)) {
        header("Location: ./index.php");
        exit;
    }
    


    /*
     *  Obtener el mensaje de la URL
     */
    $mensaje = "";
    if (isset($_GET["mensaje"])) {
        $mensaje = trim(strip_tags($_GET["mensaje"]));
    }
    


    /*
     *  Vincular parámetros y llamar a la pantalla
     */
    $parametros = array("mensaje" => $mensaje);
    $pantalla = new Pantalla("./../../pantallas/videoStreaming"); 
    $pantalla -> mostrarPantalla("login.tpl", $parametros);
?>
