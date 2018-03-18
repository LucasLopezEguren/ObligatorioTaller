<?php
session_start();
    //agrego la clase de conexion a la BD
    require_once("includes/class.Conexion.BD.php");
    require_once("config/configuracion.php");
    require_once("includes/libs/Smarty.class.php");

    
    //creo una instancia de conexion
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

    $pregunta = $_POST['txtPregunta'];
    $email = (String)$_SESSION['usuario'];
    $pubId = (int)$_POST['pubId'];
    //veo que puedo conectarme a la BD
    if($conn->conectar()){
        //armo la SQL
        $sql = "SELECT id FROM Usuarios WHERE email = '" . $email ."'";
        $parametros = array();
        
        if($conn->consulta($sql, $parametros)){
            $usuDatos= $conn->siguienteRegistro();
            $usuId= (int)$usuDatos['id'];
            //armo la SQL
            $sql = "INSERT INTO Preguntas (id_publicacion,texto,usuario_id)";
                $sql .= " VALUES (:pubId, :pregunta, :usuId)";
                    
            //cargo los parametros para la sql
            $parametros = array();
            $parametros[0] = array("pubId",$pubId,"int");
            $parametros[1] = array("pregunta",$pregunta,"string");  
            $parametros[2] = array("usuId",$usuId,"int");
            //ejecuto la consulta
            if($conn->consulta($sql,$parametros)){
                header("Location: publicacion.php?item=".$pubId);
            }
            else{
                echo "Error de Consulta 2 " . $conn->ultimoError();
            }
        } else {
                echo "Error de Consulta 1 " . $conn->ultimoError();
        }
    }
?>
