<?php

session_start();

$_SESSION['ingreso'] = false;
unset($_SESSION['mensaje']);

$_SESSION['usuario'] = "Desconectado";
header("Location: index.php");

?>

