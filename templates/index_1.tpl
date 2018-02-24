<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi primer APP</title>
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
