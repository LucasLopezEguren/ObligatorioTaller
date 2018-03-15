<html>
    <head>
        <meta charset="UTF-8">
        <title>Mascotas APP</title>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>            
        <script type="text/javascript" src="js/admUsuarios.js"></script> 
        <script type="text/javascript" src="js/nuevaPublicacion.js"></script>   
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
        <div style="align-content: center" class="registros" class="izq">
            <p class="izq">Ingrese datos para todos los campos a continuacion: </p>
            <form method="POST" enctype="multipart/form-data" action="graboPublicacion.php">
                <table>
                    <tr>
                        <td>Título: </td>
                        <td><input type="text" id="pubNombre" class="noVoid" name="pubNombre"/></td> 							
                    </tr>
                    <tr>
                        <td><div id="errusuNombre" class="error"></br></div></td>
                    </tr>
                    </tr>
                    <tr>
                        <td>Estado:</td>
                        <td><input type="radio" id="Encontrado" name="Estado" value="Encontrado" required/>Encontrado</td>
                        <td><input type="radio" id="Perdido" name="Estado" value="Perdido"/>Perdido</td>
                    </tr>
                    <tr>
                        <td><div id="errEstado" class="mensaje"></br></div></td>
                    </tr>
                    <tr>
                        <td>Descripción:</td>
                        <td><input type="text" id="pubDesc" class="noVoid" name="pubDesc"/></td> 
                    </tr>
                    <tr>
                        <td><div id="errusuCorreo" class="mensaje"></br></div></td>
                    </tr>
                    <tr>
                        <td>Especie: <select id="especies" name="especies">
                                {foreach from=$especies item=especie}
                                    <option value="{$especie['id']}" {if $especie['id'] eq 0}selected="selected"{/if}>{$especie['nombre']}</option>
                                {/foreach}
                            </select></td>
                        <td>Raza: <select id="razas" name="razas">
                                <selected value="Seleccione Especie"</option>
                            </select>   
                    </tr>
                    <tr>
                        <td>Barrio: <select id="barrio" name="barrio">
                                {foreach from=$barrios item=barrio}
                                    <option value="{$barrio['id']}" {if $barrio['id'] eq 0}selected="selected"{/if}>{$barrio['nombre']}</option>
                            {/foreach}</td> 							
                    </tr>
                    <tr>
                        <td>Foto: </td>
                        <td><input type="file" id="foto" name="foto"/></td> 							
                    </tr>
                </table>
                <input type="submit" value="Publicar">
            </form>
        </div>
    </body>
</html>
