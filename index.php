<?php

session_start();

require_once("includes/libs/Smarty.class.php");
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");


$respuesta = array();
$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);
if($conn->conectar()){
    $sql = "SELECT id,nombre FROM Especies";
    
    $parametros = array();
        
    if($conn->consulta($sql, $parametros)){
        $listadoEspecies = $conn->restantesRegistros();  
        $sql = "SELECT id,nombre FROM Barrios";
        if($conn->consulta($sql, $parametros)){
        $listadoBarrios = $conn->restantesRegistros();  
        $smarty = new Smarty();

        $smarty->template_dir = "templates";
        $smarty->compile_dir = "templates_c";
        if(is_null($_SESSION['usuario'])){
        $_SESSION['usuario'] = "Desconectado";
        }
        $smarty->assign("usuario",$_SESSION['usuario']);
        $smarty->assign("especies",$listadoEspecies);
        $smarty->assign("usuId",$usuId);
        $smarty->assign("barrios",$listadoBarrios);
        $smarty->display("index.tpl"); 
        }
    }
        else{
            $respuesta['estado'] = "ERROR";
            $respuesta['mensaje'] = "Error de consulta 1 " . $conn->ultimoError();
        }
    }
    else{
        $respuesta['estado'] = "ERROR";
        $respuesta['mensaje'] = "Error de Conexión " . $conn->ultimoError();
    }       
?>