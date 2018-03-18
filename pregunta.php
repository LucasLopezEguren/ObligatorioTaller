<?php
session_start();
    //agrego la clase de conexion a la BD
    require_once("includes/class.Conexion.BD.php");
    require_once("config/configuracion.php");

    //creo una instancia de conexion
    $conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

    $pregunta = $_POST['txtPregunta'];
    $usuCorreo = $_POST['usuCorreo'];
    $pubId = (int)$_POST['pubId'];
    //veo que puedo conectarme a la BD
    if($conn->conectar()){
        //armo la SQL
        $sql = "SELECT id FROM Usuarios WHERE email = " . $usuCorreo;
        $parametros = array();
        
        if($conn->consulta($sql, $parametros)){
            $usuDatos= $conn->restantesRegistros();
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
                echo "Error de Consulta " . $conn->ultimoError();
            }
        }
    }
?>
