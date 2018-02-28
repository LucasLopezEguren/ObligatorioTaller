<html>
    <head>
        <meta charset="UTF-8">
        <title>Mascotas APP</title>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>            
        <script type="text/javascript" src="js/admUsuarios.js"></script>            
    </head>
    <body>
        {include file="cabezal.tpl"}
        
        <div style="float: left">
            {include file="menu.tpl"}
        </div>
        <div style="float: right; align-content: center">
                <h1>Alta de Usuarios</h1>
                <form method="POST" action="actualizoUsuario.php">
                    <input type="hidden" name="usuId" id="usuId" value="{$usuario['usuId']}">
                    Nombre: <input type="text" id="usuNombre" name="usuNombre" value="{$usuario['usuUsuario']}"/>
                    <br>
                    Correo: <input type="text" id="usuCorreo" name="usuCorreo" value="{$usuario['usuCorreo']}"/>
                    <br>
                    Clave: <input type="password" id="usuClave" name="usuClave" value="{$usuario['usuClave']}"/>
                    <br>
                    <input type="submit" value="Modificar Usuario">
                </form>
        </div>
    </body>
</html>
