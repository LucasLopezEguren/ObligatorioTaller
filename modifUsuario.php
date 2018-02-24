<?php
session_start();

require_once("includes/libs/Smarty.class.php");
//agrego la clase de conexion a la BD
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");

//creo una instancia de conexion
$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

$usuId = (int)$_GET['id'];

//veo que puedo conectarme a la BD
if($conn->conectar()){
    //armo la SQL
    $sql = "SELECT * FROM Usuarios WHERE id = :id";
    //cargo los parametros para la sql
    $parametros = array();
    $parametros[0] = array("id",$usuId,"int");
    //ejecuto la consulta
    if($conn->consulta($sql,$parametros)){
        
        $usuario = $conn->siguienteRegistro();
        
        $smarty = new Smarty();

        $smarty->template_dir = "templates";
        $smarty->compile_dir = "templates_c";

        //TODO
        $smarty->assign("usuario",$_SESSION['usuario']);
        $smarty->assign("usuario",$usuario);
        
        $smarty->display("modifUsuario.tpl");
    }
    else{
        echo "Error de Consulta " . $conn->ultimoError();
    }
}
else{
    echo "Error de Conexión " . $conn->ultimoError();
}

?>
