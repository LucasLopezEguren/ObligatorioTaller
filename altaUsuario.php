<?php
session_start();

require_once("includes/libs/Smarty.class.php");
$mensaje = $_SESSION['mensaje'];
$smarty = new Smarty();
$smarty->template_dir = "templates";
$smarty->compile_dir = "templates_c";
$smarty->assign("usuario", $_SESSION['usuario']);
$smarty->assign("mensaje", $mensaje);
$smarty->display("altaUsuario.tpl");
?>