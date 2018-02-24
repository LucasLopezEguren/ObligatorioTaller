<?php
session_start();

if(!$_SESSION['ingreso'] || $_SESSION['usuario']!="admin"){
    $_SESSION['mensaje'] = "Debe registrarse para acceder al área privada";
    header("Location: index.php");
}
else{
    //agrego la clase de conexion a la BD
    require_once("includes/class.Conexion.BD.php");
    require_once("config/configuracion.php");

    //creo una instancia de conexion
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

    $usuUsuario = $_POST['usuUsuario'];
    $usuClave = $_POST['usuClave'];
    $usuCorreo = $_POST['usuCorreo'];

    //veo que puedo conectarme a la BD
    if($conn->conectar()){
        //armo la SQL
        $sql = "INSERT INTO Usuarios (usuUsuario, usuClave, usuCorreo, usuFecCre)";
        $sql .= " VALUES (:usu, :cla, :corr, now())";

        //cargo los parametros para la sql
        $parametros = array();
        $parametros[0] = array("usu",$usuUsuario,"string");
        $parametros[1] = array("cla",md5($usuClave),"string");
        $parametros[2] = array("corr",$usuCorreo,"string");
        //ejecuto la consulta
        if($conn->consulta($sql,$parametros)){
            header("Location: admUsuarios.php");
        }
        else{
            echo "Error de Consulta " . $conn->ultimoError();
        }
    }
    else{
        echo "Error de Conexión " . $conn->ultimoError();
    }
}
?>
