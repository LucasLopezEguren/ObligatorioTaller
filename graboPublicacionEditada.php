<?php

session_start();
//agrego la clase de conexion a la BD
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");
require_once("includes/libs/Smarty.class.php");

$pubId = (int) $_REQUEST['pubId'];
$fotoOriginal = $_REQUEST['fotoOriginal'];
$nuevaFoto= FALSE;

if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
    $nuevoNombre = "fotos/" . date("YmdHis") . "_" . ($_FILES['foto']['name']);
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $nuevoNombre)) {
        $foto = $nuevoNombre;
        $nuevaFoto=TRUE;
    } else {
        die("Error al procesar archivo");
    }
} else {
    $foto=$fotoOriginal;
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
$exitoso = NULL;
$abierto = 1;

if ($estado == "Reunido") {
    $estado = "E";
    $exitoso = 0;
    $abierto = 0;

}

//veo que puedo conectarme a la BD
if ($conn->conectar()) {
    $sql1 = "SELECT id FROM Usuarios WHERE email = '" . $usuNom ."'";
    $parametros = array();
    $parametros2 = array();
        
    if($conn->consulta($sql1, $parametros)){
        $usuDatos= $conn->siguienteRegistro();
        $usuId= (int)$usuDatos['id'];
    
        //armo la SQL
        $sql = "UPDATE Publicaciones SET titulo=:nom, descripcion=:desc, tipo=:est, especie_id=:espId,"
                . "raza_id=:razaId, barrio_id=:barId, abierto=:abierto, usuario_id=:usuId, exitoso=:exitoso, pubFoto=:rutFoto WHERE id=$pubId";
        

        $sql2 = "INSERT INTO Publicaciones_Fotos (id_publicacion, pubFoto) VALUES ($id, $foto)"
                    . "ON DUPLICATE KEY UPDATE pubFoto = pubFoto";
        
        //cargo los parametros para la sql
        $parametros = array();
        $parametros[0] = array("nom", $pubNombre, "string");
        $parametros[1] = array("desc", $pubDesc, "string");
        $parametros[2] = array("est", $estado, "string");
        $parametros[3] = array("espId", $espId, "int");
        $parametros[4] = array("razaId", $razaId, "int");
        $parametros[5] = array("barId", $barrio, "int");
        $parametros[6] = array("abierto", $abierto, "int");
        $parametros[7] = array("usuId", $usuId, "int");
        $parametros[8] = array("exitoso", $exitoso, "int");
        $parametros[9] = array("rutFoto", $foto, "string");

//        echo "<pre>";
//        print_r($parametros);
//        echo "<pre>";
        if($nuevaFoto==TRUE){
            $parametros2[0] = array("id", $id, "int");
            $parametros2[1] = array("rutaFoto", $foto, "string");
            $conn->consulta($sql2, $parametros2);
            
        }

        if ($conn->consulta($sql, $parametros)) {
            header("Location: admUsuarios.php");
        } else {
            echo "Error de Consulta de insersion" . $conn->ultimoError();
        }
    } else {
        echo "Error de Consulta 1 " . $conn->ultimoError();
    }
} else {
    echo "Error de Conexión " . $conn->ultimoError();
}
?>
