<?php

session_start();

$valores = array(23,1,44,267);
$valores[] = 33;

$datos = array("Enero"=>124,
               "Febrero"=>332,
               "Marzo"=>8372);

$personas = array(
                array("nombre"=>"Ana",
                      "edad"=>23,
                      "correo"=>"ana@gmail.com"),
                array("nombre"=>"José",
                      "edad"=>45,
                      "correo"=>"jose@gmail.com"),
                array("nombre"=>"Juan",
                      "edad"=>31,
                      "correo"=>"juan@gmail.com")
            );

require_once("includes/libs/Smarty.class.php");

if(!$_SESSION['ingreso']){
    $_SESSION['mensaje'] = "Debe registrarse para acceder al área privada";
    header("Location: index.php");
}
else{
    $smarty = new Smarty();
    
    $smarty->template_dir = "templates";
    $smarty->compile_dir = "templates_c";
    
    //TODO
    $smarty->assign("usuario",$_SESSION['usuario']);
    $smarty->assign("valores",$valores);
    $smarty->assign("datos",$datos);
    $smarty->assign("personas",$personas);
    
    $smarty->display("privada2.tpl");
            
}

?>