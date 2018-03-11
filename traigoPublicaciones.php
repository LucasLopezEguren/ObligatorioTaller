<?php

session_start();

require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");

$filtro = $_POST['filtro'];
$pagina = (int)$_POST['pagina'];
if($pagina <= 0 ){
    $pagina = 1;
}

$respuesta = array();
   
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);
    if($conn->conectar()){
        $sql = "SELECT count(titulo) Total";
        $sql .= " FROM Publicaciones";
        $parametros = array();

        if($conn->consulta($sql, $parametros)){        
            $fila = $conn->siguienteRegistro();
            
            $cantPags = ceil($fila["Total"] / CANTXPAG);
                    
            $inicio = ($pagina -1) * CANTXPAG;
            
            $sql = "SELECT titulo, descripcion";
            $sql .= " FROM Publicaciones";
//           $sql .= " WHERE Usuarios.deptoId = Departamentos.deptoId";
//            $sql .= " AND Usuarios.locId = Localidades.locId";
//            $sql .= " AND (usuUsuario LIKE '%" . $filtro . "%' OR ";
//            $sql .= " usuCorreo LIKE '%" . $filtro . "%')";
//            $sql .= " LIMIT :ini, :cant";

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
