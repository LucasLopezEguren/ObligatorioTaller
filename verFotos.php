<?php

session_start();
//agrego la clase de conexion a la BD
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");
require_once("includes/libs/Smarty.class.php");

$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

if ($conn->conectar()) {

    $pubId = (int) $_REQUEST['pubId'];


    $sql2 = "SELECT pubFoto FROM Publicaciones_fotos WHERE id_publicacion=$pubId";
    $parametros2 = array();


    if ($conn->consulta($sql2, $parametros2)) {
        $parametros2 = $conn->restantesRegistros();
    }
}

$smarty = new Smarty();

$smarty->template_dir = "templates";
$smarty->compile_dir = "templates_c";

$smarty->assign("listaFotos", $parametros2);

$smarty->display("verFotos.tpl");
