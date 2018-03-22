<?php

session_start();

require_once("includes/libs/Smarty.class.php");
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");

$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

$pubId = (int) $_REQUEST['pubId'];

if ($conn->conectar()) {
    $sql = "SELECT titulo, Publicaciones.id, LEFT(descripcion,150) descCorta, descripcion, pubFoto,";
    $sql .= " tipo, Publicaciones.especie_id, raza_id, barrio_id, usuario_id, titulo,";
    $sql .= " Razas.nombre raza, Especies.nombre especie, Barrios.nombre barrio, email";
    $sql .= " FROM Publicaciones, Especies, Razas, Barrios, Usuarios";
    $sql .= " WHERE Especies.id = Publicaciones.especie_id AND ";
    $sql .= " Usuarios.id = usuario_id AND ";
    $sql .= " Razas.id = Publicaciones.raza_id AND ";
    $sql .= " Barrios.id = Publicaciones.barrio_id AND ";
    $sql .= " Publicaciones.id =" . $pubId;

    $parametros = array();

    if ($conn->consulta($sql, $parametros)) {
        $publicacion = $conn->restantesRegistros();
    }


        $smarty = new Smarty();


        $smarty->template_dir = "templates";
        $smarty->compile_dir = "templates_c";

        $smarty->assign("usuario", $_SESSION['usuario']);
        $smarty->assign("publicacion", $publicacion);
        $smarty->display("editarPublicacion.tpl");


//echo "<pre>";
//print_r($publicacion);
//echo "<pre>";
    }
