<html>
    <head>
        <meta charset="UTF-8">
        <title>Mascotas APP</title>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>            
        <script type="text/javascript" src="js/admUsuarios.js"></script>            
    </head>
    <body>
        {include file="cabezal.tpl"}
        <div id="cuerpo">
            <div style="float: left">
                {include file="menu.tpl"}
            </div>
            <div style="float: left;" align-content: center>
                <div style="float: left;" align-content: center>
                    <br>
                    <table>
                        {foreach from=$publicacion item=publi}
                            <tr>
                            <img src='{$publi['pubFoto']}'>
                            </tr>
                            <tr>
                                <td colspan="4"><h3>{$publi['titulo']}</h3></td>                            
                            </tr>
                            <tr>                            
                                {if $publi['tipo'] eq "E"}
                                    <td>Tipo publicacion: Encontrado</td>
                                {else}
                                    <td>Tipo publicacion: Perdido</td>
                                {/if}
                                <td>Animal: {$publi['especie']}</td>
                                <td>Raza: {$publi['raza']}</td>
                                <td>en: {$publi['barrio']}</td>
                            </tr>
                            <tr>
                                <td colspan='4' class='celdaPublicacionDesc'>{$publi['descripcion']}</td>
                            </tr>
                            <tr>
                                <td colspan='4'><h3>Preguntas y respuestas</h3></td>
                            </tr>
                            {foreach from=$preguntas item=pregunta}
                                <tr>
                                    <td colspan='2' widht ='80px' class='celdaPYR'>{$pregunta['texto']}</td>
                                    {if $usuario eq $publi['email'] and $pregunta['respuesta'] eq ""}
                                    <form method="POST" action="respuesta.php">
                                        <input type="hidden" name="pregId" id="pregId" value="{$pregunta['pregId']}">
                                        <input type="hidden" name="pubId" id="pubId" value="{$publi['id']}">
                                        <td class='celdaPYR'><input type="textbox" id='txtRespuesta' name='txtRespuesta'></td>    
                                        <td class='celdaPYR'><input type ='submit' value='Responder'></td>
                                    </form>
                                {else}
                                    <td class='celdaPYR'>{$pregunta['respuesta']}</td>
                                {/if}
                                </tr>
                            {/foreach}
                            {if $usuario neq $publi['email'] and $usuario neq "Desconectado"}
                                <tr>
                                <form method="POST" action="pregunta.php">
                                    <input type="hidden" name="pubId" id="pubId" value="{$publi['id']}">
                                    <input type="hidden" name="usuCorreo" id="usuCorreo" value="{$usuario}">
                                    <td class='celdaPYR'><input type="textbox" id='txtPregunta' name='txtPregunta'></td>    
                                    <td class='celdaPYR'><input type ='submit' value='Nueva Pregunta'></td>
                                </form>
                                </tr>
                            {/if}
                            {if $usuario eq "Desconectado"}
                                <tr>
                                    <td>Inicia sesión para realizar una pregunta</td>
                                </tr>
                            {/if}
                        {/foreach}
                    </table>
                    {if $usuario eq $publi['email']}
                        <form action="editarPublicacion.php">
                            <input type="Submit" value="Editar" />
                            <input type="hidden" name="pubId" id="pubId" value="{$publi['id']}">
                        </form>
                    {/if}
                </div>
            </div>
        </div>            
    </body>
</html>
