<?php

session_start();

require_once("includes/libs/Smarty.class.php");
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");

if (!$_SESSION['ingreso']) {
    $_SESSION['mensaje'] = "Debe registrarse para acceder al área privada";
    header("Location: index.php");
} else {
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);
    if ($conn->conectar()) {

        $sql = "SELECT * FROM Especies ORDER BY nombre";
        $sql2 = "SELECT * FROM Barrios ORDER BY nombre";

        $parametros = array();
        $parametros2 = array();

        if ($conn->consulta($sql, $parametros)) {

            $listadoEspecies = $conn->restantesRegistros();

            if ($conn->consulta($sql2, $parametros2)) {

                $listadoBarrios = $conn->restantesRegistros();

                $smarty = new Smarty();

                $smarty->template_dir = "templates";
                $smarty->compile_dir = "templates_c";

                $smarty->assign("usuario",$_SESSION['usuario']);
                $smarty->assign("especies", $listadoEspecies);
                $smarty->assign("barrios", $listadoBarrios);

                $smarty->display("nuevaPublicacion.tpl");
            }
        }
    }
}
?>