<?php

session_start();
//agrego la clase de conexion a la BD
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");
require_once("includes/libs/Smarty.class.php");

$extensiones = array('gif', 'png', 'jpg', 'jpeg');

if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
    $nuevoNombre = "fotos/" . date("YmdHis") . "_" . ($_FILES['foto']['name']);
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $nuevoNombre)) {
        $foto = $nuevoNombre;
        $ext = pathinfo($foto, PATHINFO_EXTENSION);
    } else {
        die("Error al procesar archivo");
    }
} else {
//    print_r($_FILES['foto']['tmp_name']);
    #die("Error al subir archivo");
    $smarty = new Smarty();
    $_SESSION['mensaje'] = "Debe adjuntar una foto de la mascota";
    header("Location: nuevaPublicacion.php");
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

//if (!empty($pubNombre) || !empty($pubDesc) || !empty($estado) || !empty($espId) || !empty($razaId) || !empty($barrio)) {

if (!(empty($pubNombre)) and ! (empty($pubDesc)) and ! (empty($estado)) and ! (empty($espId)) and ! (empty($razaId)) and ! (empty($barrio))) {
//veo que puedo conectarme a la BD
    if (in_array($ext, $extensiones)) {

        if ($conn->conectar()) {
            $sql1 = "SELECT id FROM Usuarios WHERE email = '" . $usuNom . "'";
            $parametros = array();

            if ($conn->consulta($sql1, $parametros)) {
                $usuDatos = $conn->siguienteRegistro();
                $usuId = (int) $usuDatos['id'];

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
                $parametros[6] = array("abierto", 1, "int");
                $parametros[7] = array("usuId", $usuId, "int");
                $parametros[8] = array("exitoso", NULL, "int");
                $parametros[9] = array("rutFoto", $foto, "string");

                //    ejecuto la consulta
                if ($conn->consulta($sql, $parametros)) {

                    $sql2 = "SELECT id FROM Publicaciones WHERE pubFoto = '" . $foto . "'";
                    $parametros2 = array();
                    if ($conn->consulta($sql2, $parametros2)) {
                        $id = $conn->siguienteRegistro();
                        $id1 = (int) $id['id'];
                        print_r($id1);

                        $sql3 = "INSERT INTO Publicaciones_fotos (id_publicacion, pubFoto) "
                                . "VALUES (:id, :rutaFoto)";

                        $parametros3 = array();
                        $parametros3[0] = array("id", $id1, "int");
                        $parametros3[1] = array("rutaFoto", $foto, "string");
                        $conn->consulta($sql3, $parametros3);
                    }
                    header("Location: index.php");
                } else {
                    echo "Error de Consulta de insersion: " . $conn->ultimoError();
                }
            } else {
                echo "Error de Consulta de seleccion de id: " . $conn->ultimoError();
            }
        } else {
            echo "Error de Conexión " . $conn->ultimoError();
        }
    } else {
        $smarty = new Smarty();
        $_SESSION['mensaje'] = "La imagen debe estar en uno de los siguientes formatos: jpg, png, jpeg, gif";
        header("Location: nuevaPublicacion.php");
    }
} else {
    $smarty = new Smarty();
    $_SESSION['mensaje'] = "No pueden haber campos vacíos";
    header("Location: nuevaPublicacion.php");
}
?>
