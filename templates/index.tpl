<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mascotas APP</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="js/jquery-2.0.3.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <meta name="Keywords" content="palabras claves">
        <meta name="Description" content="este sitio esta creado para las mascotas perdidas">
        <meta name="Author" content="Lucas Lopez - Luca Miraglia">
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    </head>
    <body>        
        <form method="post" action="procesoLogin.php">
            Usuario: <input type="text" id="txtUsuario" name="txtUsuario" value="{$usuario}"/>
            <br/>
            Clave: <input type="password" id="txtClave" name="txtClave"/>
            <br/>
            <input type="submit" value="Ingresar al Sistema"/>
        </form>
        <div>{$mensaje}</div>
    </body>
</html>
