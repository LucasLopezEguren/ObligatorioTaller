<?php
session_start();
    //agrego la clase de conexion a la BD
    require_once("includes/class.Conexion.BD.php");
    require_once("config/configuracion.php");

    //creo una instancia de conexion
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

    $respuesta = $_POST['txtRespuesta'];
    $pubId = (int)$_POST['pubId'];
    $pregId = (int)$_POST['pregId'];
    //veo que puedo conectarme a la BD
    if($conn->conectar()){
        //armo la SQL
        $sql = "UPDATE Preguntas SET respuesta = :resp WHERE id=:id";

        //cargo los parametros para la sql
        $parametros = array();
        $parametros[0] = array("resp",$respuesta,"string");
        $parametros[1] = array("id",$pregId,"int");
        //ejecuto la consulta
        if($conn->consulta($sql,$parametros)){
            header("Location: publicacion.php?item=".$pubId);
        }
        else{
            echo "Error de Consulta " . $conn->ultimoError();
        }
    }
?>
