<?php

session_start();
//agrego la clase de conexion a la BD
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");
require_once("includes/libs/Smarty.class.php");

$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

if ($conn->conectar()) {

    $pubId = (int) $_REQUEST['pubId'];

    $sql1 = "SELECT pubFoto FROM Publicaciones WHERE id=$pubId";
    $parametros1 = array();

    $sql2 = "SELECT pubFoto FROM Publicaciones_fotos WHERE id_publicacion=$pubId";
    $parametros2 = array();

    if ($conn->consulta($sql1, $parametros1)) {
        $parametros1 = $conn->restantesRegistros();
    }

    if ($conn->consulta($sql2, $parametros2)) {
        $parametros2 = $conn->restantesRegistros();
    }
}

$smarty = new Smarty();

$smarty->template_dir = "templates";
$smarty->compile_dir = "templates_c";

$smarty->assign("fotoPrincipal", $parametros1);
$smarty->assign("fotosSecundarias", $parametros2);

$smarty->display("verFotos.tpl");
