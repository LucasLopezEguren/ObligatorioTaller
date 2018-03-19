<?php
session_start();

require_once("includes/libs/Smarty.class.php");
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");

$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

if (!$_SESSION['ingreso']) {
    $_SESSION['mensaje'] = "Debe registrarse para acceder al área privada";
    header("Location: index.php");
} else {
    if ($conn->conectar()) {
        //armo la SQL
        $sql = "SELECT count( Publicaciones.id ) Total, nombre Animal, ";
        $sql .= " SUM(case exitoso when 1 then 1 else 0 end) Exitosos, SUM(abierto) Abiertos";
        $sql .= " FROM Publicaciones, Especies";
        $sql .= " Where especie_id = Especies.id";
        $sql .= " GROUP BY especie_id";

        //cargo los parametros para la sql
        $parametros = array();
        //ejecuto la consulta
        if ($conn->consulta($sql, $parametros)) {
            $listadoEstadisticas = $conn->restantesRegistros();
            $smarty = new Smarty();

            $smarty->template_dir = "templates";
            $smarty->compile_dir = "templates_c";

            $smarty->assign("listadoEstadisticas", $listadoEstadisticas);
            $smarty->assign("usuario",$_SESSION['usuario']);
            $smarty->display("estadisticas.tpl");
        } else {
            echo "Error de Consulta " . $conn->ultimoError();
        }
    }
}
?>
