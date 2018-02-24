<?php

session_start();

require_once("includes/libs/Smarty.class.php");
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");

if(!$_SESSION['ingreso'] || $_SESSION['usuario']!="admin"){
    $_SESSION['mensaje'] = "Debe registrarse para acceder al área privada";
    header("Location: index.php");
}
else{
    $smarty = new Smarty();
    
    $smarty->template_dir = "templates";
    $smarty->compile_dir = "templates_c";
    
    //TODO
    $smarty->assign("usuario",$_SESSION['usuario']);
    
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);
    if($conn->conectar()){
        $sql = "SELECT * FROM Usuarios";
        $parametros = array();
        if($conn->consulta($sql, $parametros)){
            $listadoUsuarios = $conn->restantesRegistros();
            $smarty->assign("usuarios",$listadoUsuarios);            
            $smarty->display("admUsuarios.tpl");     
        }
        else{
            echo "Error de consulta " . $conn->ultimoError();
        }
    }
    else{
        echo "Error de Conexión " . $conn->ultimoError();
    }       
}

?>