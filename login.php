<?php
session_start();

require_once("includes/libs/Smarty.class.php");

$mensaje = $_SESSION['mensaje'];

$smarty = new Smarty();

$smarty->template_dir = "templates";
$smarty->compile_dir = "templates_c";

//TODO
$smarty->assign("usuario","Desconectado");
$smarty->assign("mensaje",$mensaje);

$smarty->display("login.tpl");

?>