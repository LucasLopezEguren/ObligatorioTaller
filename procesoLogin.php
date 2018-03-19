<?php

session_start();

//agrego la clase de conexion a la BD
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");
require_once("includes/libs/Smarty.class.php");

//creo una instancia de conexion
$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

$usuario = $_POST['txtUsuario'];
$clave = $_POST['txtClave'];
//$loged;
//veo que puedo conectarme a la BD
if ($conn->conectar()) {
    //armo la SQL
    $sql = "SELECT * FROM Usuarios WHERE email = :usu";
    //cargo los parametros para la sql
    $parametros = array();
    $parametros[0] = array("usu", $usuario, "string");
    //ejecuto la consulta
    if ($conn->consulta($sql, $parametros)) {
        //obtengo la fila encontrada
        $fila = $conn->siguienteRegistro();
        //veo si la clave es la correcta
        if (md5($clave) == $fila['password']) {
            $_SESSION['ingreso'] = true;
            $_SESSION['usuario'] = $fila['email'];
            setcookie("txtUsu", $usuario, time() + (60 * 60 * 24));

            $smarty = new Smarty();
            $smarty->template_dir = "templates";
            $smarty->compile_dir = "templates_c";
            $idUsu = $fila['id'];

            //TODO
            $smarty->assign("usuId", $idUsu);
            header("Location: index.php");
        } else {
            $_SESSION['ingreso'] = false;
            $_SESSION['mensaje'] = "Usuario o clave erronea!";
            header("Location: login.php");
        }
    } else {
        echo "Error de Consulta " . $conn->ultimoError();
    }
} else {
    echo "Error de Conexión " . $conn->ultimoError();
}
?>
