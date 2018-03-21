<?php

session_start();

require_once("includes/libs/Smarty.class.php");
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");

$pubIds = (int) $_GET['pubId'];
$respuesta = array();
$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);
if ($conn->conectar()) {
    $sql = "SELECT id FROM Publicaciones WHERE id =" . $pubIds;

    $parametros = array();

    if ($conn->consulta($sql, $parametros)) {
        $id = $conn->siguienteRegistro();
        $pubId = (int)$id['id'];

        $smarty = new Smarty();

        $smarty->template_dir = "templates";
        $smarty->compile_dir = "templates_c";
        if (is_null($_SESSION['usuario'])) {
            $_SESSION['usuario'] = "Desconectado";
        }
        $smarty->assign("pubId", $pubIds);
        $smarty->assign("usuario", $_SESSION['usuario']);
        $smarty->display("verFotos.tpl");
    }
} else {
    $respuesta['estado'] = "ERROR";
    $respuesta['mensaje'] = "Error de Conexión " . $conn->ultimoError();
}
?>