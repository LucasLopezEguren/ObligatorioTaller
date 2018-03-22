<?php

require('includes/fpdf.php');
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");


//creo una instancia de conexion
$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

$pubId = (int) $_GET['pubId'];
//veo que puedo conectarme a la BD
if ($conn->conectar()) {
//armo la SQL
    $sql = "SELECT titulo, descripcion, tipo, Especies.nombre animal, ";
    $sql .= "Razas.nombre raza, Barrios.nombre barrio, abierto, exitoso, pubFoto";
    $sql .= " FROM Publicaciones, Especies, Razas, Barrios";
    $sql .= " WHERE Publicaciones.id = " . $pubId;
    $sql .= " AND Publicaciones.especie_id = Especies.id";
    $sql .= " AND Razas.id = raza_id";
    $sql .= " AND Barrios.id = barrio_id";
    $parametros = array();

    if ($conn->consulta($sql, $parametros)) {
        $usuDatos = $conn->siguienteRegistro();
        $titulo = (String) $usuDatos['titulo'];
        $titulo = iconv('UTF-8', 'windows-1252', $titulo);
        $descripcion = (String) $usuDatos['descripcion'];
        $descripcion = iconv('UTF-8', 'windows-1252', $descripcion);
        $tipo = (String) $usuDatos['tipo'];
        $DatosPrint = "";
        if (strpos($tipo, 'E')) {
            $DatosPrint = "Tipo: Encontrado";
        } else {
            $DatosPrint = "Tipo: Perdido";
        }
        $animal = (String) $usuDatos['animal'];
        $DatosPrint .= " - Especie: " . $animal;
        $raza = (String) $usuDatos['raza'];
        $DatosPrint .= " - Raza: " . $raza;
        $barrio = (String) $usuDatos['barrio'];
        $DatosPrint .= " - Lugar: " . $barrio;
        $abierto = (int) $usuDatos['abierto'];
        if ($abierto > 0) {
            $DatosPrint .= " - La publicacion esta cerrada";
            $exitoso = (int) $usuDatos['exitoso'];
            if ($exitoso > 0) {
                $DatosPrint .= " - La mascota no se reunió con su dueño ";
            } else {
                $DatosPrint .= " - La mascota se reunió con su dueño ";
            }
        } else {
            $DatosPrint .= " - La publicacion sigue abierta";
        }
        $DatosPrint = iconv('UTF-8', 'windows-1252', $DatosPrint);
        $pubFoto = (String) $usuDatos['pubFoto'];

//armo la SQL
        $sql = "SELECT pubFoto";
        $sql .= " FROM Publicaciones_fotos";
        $sql .= " WHERE id_publicacion = " . $pubId;
        $parametros = array();

        if ($conn->consulta($sql, $parametros)) {
            $fotos = $conn->restantesRegistros();
        } else {
            echo "Error de Consulta  2 " . $conn->ultimoError();
        }
    } else {
        echo "Error de Consulta " . $conn->ultimoError();
    }
} else {
    echo "Error de conexion " . $conn->ultimoError();
}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(60, 10, $titulo, 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(60, 10, $DatosPrint, 0, 1);
$pdf->Cell(60, 10, $descripcion, 0, 1);
foreach ($fotos as $foto) {
    $pdf->AddPage();
    $pdf->Image($foto['pubFoto'], 10, 10);
}
$pdf->Output();
?>