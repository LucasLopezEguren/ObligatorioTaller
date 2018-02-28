<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi primer APP</title>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>            
        <script type="text/javascript" src="js/admUsuarios.js"></script>     
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="js/jquery-2.0.3.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <meta name="Keywords" content="palabras claves">
        <meta name="Description" content="este sitio esta creado para las mascotas perdidas">
        <meta name="Author" content="Lucas Lopez - Luca Miraglia">
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    </head>
    <body>
        {include file="cabezal.tpl"}
        <div style="float: left">
            {include file="menu.tpl"}
        </div>
        <div style="float: right; align-content: center">
            <div class="registros" class="izq">
            <p class="izq">Para registrarse por favor llene el siguiente formulario: </p>
            <form method="POST" action="graboUsuario.php">
                <table>
                    <tr>
                        <td>Nombre: </td>
                        <td><input type="text" id="usuNombre" class="noVoid" name="usuNombre"/></td> 							
                    </tr>
                    <tr>
                        <td><div id="errusuNombre" class="mensaje"></br></div></td>
                    </tr>
                    <tr>
                        <td>Correo/Nombre de usuario:</td>
                        <td><input type="text" id="usuCorreo" class="noVoid" name="usuCorreo"/></td> 
                    </tr>
                    <tr>
                        <td><div id="errusuCorreo" class="mensaje"></br></div></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" class="noVoid" id="usuClave" name="usuClave"/></td>
                    </tr>
                    <tr>
                        <td><div id="errusuClave" class="mensaje"></br></div></td>
                    </tr>
                    <tr>
                        <td>Sexo:</td>
                        <td><input type="radio" name="cvGender" id="cvMale"> Masculino</td> 
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="radio" name="cvGender" id="cvFemale"> Femenino</td> 
                    </tr>
                </table>
                <input type="submit" value="Agregar Usuario">
            </form>
        </div>
    </body>
</html>
