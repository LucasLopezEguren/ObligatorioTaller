<?php

session_start();

require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");

$filtroTxt = $_POST['filtro'];
$tipo = $_POST['tipo'];
$barrio = $_POST['barrio'];
$especie = $_POST['especie'];
$raza = $_POST['raza'];
$pagina = (int)$_POST['pagina'];
if($pagina <= 0 ){
    $pagina = 1;
}

$respuesta = array();
   
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);
    if($conn->conectar()){
        $sql = "SELECT count(titulo) Total, LEFT(descripcion,150) descCorta, descripcion, pubFoto,";
            $sql .= " tipo, Publicaciones.especie_id, raza_id, barrio_id, usuario_id, titulo";
            $sql .= " FROM Publicaciones, Especies, Razas, Barrios";
            $sql .= " WHERE Especies.id = Publicaciones.especie_id AND ";
            $sql .= " Razas.id = Publicaciones.raza_id AND ";
            $sql .= " Barrios.id = Publicaciones.barrio_id AND ";
            $sql .= " Barrios.id LIKE '" . $barrio . "' AND ";
            $sql .= " Razas.id LIKE '%" . $raza . "%' AND ";
            $sql .= " Especies.id LIKE '%" . $especie . "%' AND ";
            $sql .= " (titulo LIKE '%" . $filtroTxt . "%' OR ";
            $sql .= " descripcion LIKE '%" . $filtroTxt . "%') and";
            $sql .= " tipo LIKE '%" . $tipo . "%'";
            
        $parametros = array();

        if($conn->consulta($sql, $parametros)){        
            $fila = $conn->siguienteRegistro();
            
            $cantPags = ceil($fila["Total"] / CANTXPAG);
                    
            $inicio = ($pagina -1) * CANTXPAG;
            
            $sql = "SELECT titulo, Publicaciones.id, LEFT(descripcion,150) descCorta, descripcion, pubFoto,";
            $sql .= " tipo, Publicaciones.especie_id, raza_id, barrio_id, usuario_id, titulo";
            $sql .= " FROM Publicaciones, Especies, Razas, Barrios";
            $sql .= " WHERE Especies.id = Publicaciones.especie_id AND ";
            $sql .= " Razas.id = Publicaciones.raza_id AND ";
            $sql .= " Barrios.id = Publicaciones.barrio_id AND ";
            $sql .= " Barrios.id LIKE '" . $barrio . "' AND ";
            $sql .= " Razas.id LIKE '%" . $raza . "%' AND ";
            $sql .= " Especies.id LIKE '%" . $especie . "%' AND ";
            $sql .= " (titulo LIKE '%" . $filtroTxt . "%' OR ";
            $sql .= " descripcion LIKE '%" . $filtroTxt . "%') and";
            $sql .= " tipo LIKE '%" . $tipo . "%'";
            $sql .= " ORDER BY id DESC";
            $sql .= " LIMIT :ini, :cant";

            $parametros = array();
            $parametros[0] = array("ini",$inicio,"int",0);
            $parametros[1] = array("cant",CANTXPAG,"int",0);

            if($conn->consulta($sql, $parametros)){
                $listadoPublicaciones = $conn->restantesRegistros();  
                

                $respuesta['estado'] = "OK";
                $respuesta['totPaginas'] =  $cantPags;
                $respuesta['data'] = $listadoPublicaciones;

            }
            else{
                $respuesta['estado'] = "ERROR";
                $respuesta['mensaje'] = "Error de consulta 1 " . $conn->ultimoError();
            }
        }
        else{
            $respuesta['estado'] = "ERROR";
            $respuesta['mensaje'] = "Error de consulta 2 " . $conn->ultimoError();
        }       
    }
    else{
        $respuesta['estado'] = "ERROR";
        $respuesta['mensaje'] = "Error de Conexión " . $conn->ultimoError();
    }       


//para cuando respondo a la APP
echo json_encode($respuesta);

//para testing
//echo "<pre>";
//print_r($respuesta);
//echo "</pre>";
?>
