<?php
session_start();

//agrego la clase de conexion a la BD
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");

//creo una instancia de conexion
$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

$usuId = (int)$_GET['id'];

//veo que puedo conectarme a la BD
if($conn->conectar()){
    //armo la SQL
    $sql = "DELETE FROM Usuarios WHERE id = :id";
    //cargo los parametros para la sql
    $parametros = array();
    $parametros[0] = array("id",$usuId,"int");
    //ejecuto la consulta
    if($conn->consulta($sql,$parametros)){
        header("Location: admUsuarios.php");
    }
    else{
        echo "Error de Consulta " . $conn->ultimoError();
    }
}
else{
    echo "Error de Conexión " . $conn->ultimoError();
}

?>
