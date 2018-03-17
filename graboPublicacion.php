<?php

session_start();
//agrego la clase de conexion a la BD
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");


if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
    $nuevoNombre = "fotos/" . date("YmdHis") . "_" . ($_FILES['foto']['name']);
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $nuevoNombre)) {
        $foto = $nuevoNombre;
    } else {
        die("Error al procesar archivo");
    }
} else {
    print_r($_FILES['foto']['tmp_name']);
    #die("Error al subir archivo");
}

//creo una instancia de conexion
$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

$usuNom = $_SESSION['usuario'];

$pubNombre = $_POST['pubNombre'];
$estado = $_POST['Estado'];
$pubDesc = $_POST['pubDesc'];
$espId = (int) $_POST['especies'];
$razaId = (int) $_POST['razas'];
$barrio = $_POST['barrio'];

if ($estado == "Encontrado") {
    $estado = "E";
} else {
    $estado = "P";
}

//veo que puedo conectarme a la BD
if ($conn->conectar()) {
    //armo la SQL
    $sql = "INSERT INTO Publicaciones (titulo, descripcion, tipo, especie_id, raza_id, barrio_id, abierto, usuario_id, exitoso, pubFoto)";
    $sql .= " VALUES (:nom, :desc, :est, :espId, :razaId, :barId, :abierto, :usuId, :exitoso, :rutFoto)";

    //cargo los parametros para la sql
    $parametros = array();
    $parametros[0] = array("nom", $pubNombre, "string");
    $parametros[1] = array("desc", $pubDesc, "string");
    $parametros[2] = array("est", $estado, "string");
    $parametros[3] = array("espId", $espId, "int");
    $parametros[4] = array("razaId", $razaId, "int");
    $parametros[5] = array("barId", $barrio, "int");
    $parametros[6] = array("abierto", 0, "int");
    $parametros[7] = array("usuId", 1, "int");
    $parametros[8] = array("exitoso", NULL, "int");
    $parametros[9] = array("rutFoto", $foto, "string");

    echo "<pre>";
    print_r($parametros);
    echo "<pre>";


//    ejecuto la consulta
    if ($conn->consulta($sql, $parametros)) {
        header("Location: admUsuarios.php");
    } else {
        echo "Error de Consulta " . $conn->ultimoError();
    }

//    $sql2 = "INSERT INTO Publicaciones_fotos (id_publicacion, pubFoto)";
//    $sql2 .= " VALUES (:idPub, :rutFoto)";
//
//    $parametros2 = array();
//    $parametros2[0] = array("idPub", $pubNombre, "string");

} else {
    echo "Error de Conexión " . $conn->ultimoError();
}
?>
