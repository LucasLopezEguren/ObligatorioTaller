<html>
    <head>
        <meta charset="UTF-8">
        <title>Mascotas APP</title>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>            
        <script type="text/javascript" src="js/publicaciones.js"></script>
        <script type="text/javascript" src="js/nuevaPublicacion.js"></script>
    </head>
    <body>
<<<<<<< HEAD
        <div id="cuerpo">
        {include file="cabezal.tpl"}
        <div style="float: left">
            {include file="menu.tpl"}
        </div>
        <div style="float: left; align-content: center" class="registros" class="izq">
            <p class="izq">Ingrese datos para todos los campos a continuacion: </p>
            <form method="POST" enctype="multipart/form-data" action="graboPublicacionEditada.php">
                <input type="hidden" name="pubId" id="pubId" value="{$publicacion[0]['id']}">
                <input type="hidden" name="fotoOriginal" id="fotoOriginal" value="{$publicacion[0]['pubFoto']}">
                <table>
                    <tr>
                        <td>Título: </td>
                        <td><input type="text" id="pubNombre" class="noVoid" name="pubNombre" value="{$publicacion[0]['titulo']}"/></td> 							
                    </tr>
                    <tr>
                        <td><div id="errusuNombre" class="error"></br></div></td>
                    </tr>
                    </tr>
                    <tr>
                        <td>Estado:</td>
                        <td><input type="checkbox" id="Reunido" name="Estado" value="Reunido"/>Reunido con dueño</td>
                    </tr>
                    <tr>
                        <td><div id="errEstado" class="mensaje"></br></div></td>
                    </tr>
                    <tr>
                        <td>Descripción:</td>
                        <td><input type="text" id="pubDesc" class="noVoid" name="pubDesc" value="{$publicacion[0]['descripcion']}" /></td> 
                    </tr>
                    <tr>
                        <td><div id="errusuCorreo" class="mensaje"></br></div></td>
                    </tr>
                    <tr>
                        <td>Fotos: </td>
                        <td><img src='{$publicacion[0]['pubFoto']}' width="200px"></td>							
                    </tr>
                    <tr>
                        <td>Agregar foto: </td>
                        <td><input type="file" id="foto" name="foto" value="Agregar Foto"/></td> 							
                    </tr>
                </table>
                <input type="submit" value="Guardar">
            </form>
                                    <div class="error">{$mensaje}</div>
            </div>
        </div>
    </body>
</html>