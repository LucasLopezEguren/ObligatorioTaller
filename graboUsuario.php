<?php

session_start();
//agrego la clase de conexion a la BD
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");
require_once("includes/libs/Smarty.class.php");

//creo una instancia de conexion
$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

$mensaje = $_SESSION['mensaje'];
$usuUsuario = $_POST['usuNombre'];
$usuClave = $_POST['usuClave'];
$usuCorreo = $_POST['usuCorreo'];

//veo que puedo conectarme a la BD
if ($conn->conectar()) {
    $sql = "SELECT * FROM Usuarios WHERE email = :mail";
    //cargo los parametros para la sql
    $parametros = array();
    $parametros[0] = array("mail", $usuCorreo, "string");
    //ejecuto la consulta
    if ($conn->consulta($sql, $parametros)) {

        $usuario = $conn->siguienteRegistro();
        if (empty($usuario)) {
            //armo la SQL
            $sql = "INSERT INTO Usuarios (nombre, email, password)";
            $sql .= " VALUES (:nom, :email, :pass)";

            //cargo los parametros para la sql
            $parametros = array();
            $parametros[0] = array("nom", $usuUsuario, "string");
            $parametros[1] = array("email", $usuCorreo, "string");
            $parametros[2] = array("pass", md5($usuClave), "string");
            //ejecuto la consulta
            if ($conn->consulta($sql, $parametros)) {
                $_SESSION['ingreso'] = true;
                $_SESSION['usuario'] = $usuCorreo;
                setcookie("txtUsu", $usuCorreo, time() + (60 * 60 * 24));
                header("Location: index.php");
            } else {
                echo "Error de Consulta " . $conn->ultimoError();
            }
        } else {
            $smarty = new Smarty();
            $_SESSION['mensaje'] = "Ya hay un usuario con ese correo.";
            header("Location: altaUsuario.php");
        }
    } else {
        echo "Error de Consulta " . $conn->ultimoError();
    }
} else {
    echo "Error de Conexión " . $conn->ultimoError();
}
?>
