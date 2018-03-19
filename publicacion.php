<?php
session_start();

require_once("includes/libs/Smarty.class.php");
require_once("includes/class.Conexion.BD.php");
require_once("config/configuracion.php");

$id = $_GET['item'];

$respuesta = array();
$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);
if($conn->conectar()){
    $sql = "SELECT titulo, Publicaciones.id, LEFT(descripcion,150) descCorta, descripcion, pubFoto,";
        $sql .= " tipo, Publicaciones.especie_id, raza_id, barrio_id, usuario_id, titulo,";
        $sql .= " Razas.nombre raza, Especies.nombre especie, Barrios.nombre barrio, email";
        $sql .= " FROM Publicaciones, Especies, Razas, Barrios, Usuarios";
        $sql .= " WHERE Especies.id = Publicaciones.especie_id AND ";
        $sql .= " Usuarios.id = usuario_id AND ";
        $sql .= " Razas.id = Publicaciones.raza_id AND ";
        $sql .= " Barrios.id = Publicaciones.barrio_id AND ";
        $sql .= " Publicaciones.id =" . $id;
    
    $parametros = array();
        
    if($conn->consulta($sql, $parametros)){
        $publicacion = $conn->restantesRegistros();  
        $smarty = new Smarty();
        
        $sql = "SELECT texto, respuesta, Preguntas.id pregId";
            $sql .= " FROM Preguntas, Publicaciones";
            $sql .= " WHERE Publicaciones.id = id_publicacion AND ";
            $sql .= " Publicaciones.id =" . $id;
    

        $parametros = array();

        if($conn->consulta($sql, $parametros)){
        $preguntas = $conn->restantesRegistros();  

        $smarty->assign("preguntas",$preguntas);
        }
        else{
            $respuesta['estado'] = "ERROR";
            $respuesta['mensaje'] = "Error de consulta 2 " . $conn->ultimoError();
        }
        
        $smarty->template_dir = "templates";
        $smarty->compile_dir = "templates_c";
        
        $smarty->assign("usuario",$_SESSION['usuario']);
        $smarty->assign("publicacion",$publicacion);
        $smarty->display("publicacion.tpl"); 
    }
        else{
            $respuesta['estado'] = "ERROR";
            $respuesta['mensaje'] = "Error de consulta 1 " . $conn->ultimoError();
        }
    }
    else{
        $respuesta['estado'] = "ERROR";
        $respuesta['mensaje'] = "Error de Conexión " . $conn->ultimoError();
    }       
?>