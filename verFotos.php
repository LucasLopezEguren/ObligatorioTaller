<?php

session_start();
//agrego la clase de conexion a la BD
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");
require_once("includes/libs/Smarty.class.php");

$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);
$cantXpagina = 1;
if ($conn->conectar()) {

    $pubId = (int) $_POST['pubId'];
    $pagina = (int) $_POST['pagina'];
    if ($pagina <= 0) {
        $pagina = 1;
    }

    $sql1 = "SELECT count(pubFoto) Total FROM Publicaciones_fotos WHERE id_publicacion=$pubId";
    $parametros = array();
    
    if ($conn->consulta($sql1, $parametros)) {
        $fila = $conn->siguienteRegistro();

        $cantPags = $fila["Total"];

        $inicio = ($pagina - 1) * $cantXpagina;
        $sql2 = "SELECT pubFoto FROM Publicaciones_fotos WHERE id_publicacion=$pubId";
            $sql2 .= " LIMIT :ini, :cant";
            
        $parametros2 = array();        
        $parametros2[0] = array("ini", $inicio, "int", 0);
        $parametros2[1] = array("cant", $cantXpagina, "int", 0);
        
        $respuesta = array();

        if ($conn->consulta($sql2, $parametros2)) {
            $parametros2 = $conn->restantesRegistros();
            $respuesta['estado'] = "OK";
            $respuesta['totPaginas'] = $cantPags;
            $respuesta['data'] = $parametros2;
        } else {
            $respuesta['estado'] = "ERROR";
            $respuesta['mensaje'] = "Error de consulta 1 " . $conn->ultimoError();
        }
    } else {
        $respuesta['estado'] = "ERROR";
        $respuesta['mensaje'] = "Error de consulta 2 " . $conn->ultimoError();
    }
} else {
    $respuesta['estado'] = "ERROR";
    $respuesta['mensaje'] = "Error de Conexión " . $conn->ultimoError();
}

echo json_encode($respuesta);

//$smarty = new Smarty();
//
//$smarty->template_dir = "templates";
//$smarty->compile_dir = "templates_c";
//
//$smarty->assign("listaFotos", $parametros2);
//
//$smarty->display("verFotos.tpl");
?>
