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
                                <td>Encontrado</td>
                            {else}
                                <td>Perdido</td>
                            {/if}
                            <td>{$publi['especie']}</td>
                            <td>{$publi['raza']}</td>
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
                            <td colspan='2' class='celdaPublicacionDesc'>{$pregunta['texto']}</td>
                            <td colspan='2' class='celdaPublicacionDesc'>{$pregunta['respuesta']}</td>
                        </tr>
                        {/foreach}
                    {/foreach}
                </table>
                {if $usuario eq $publi['email']}
                    <input type="button" value="editar">
                {/if}
            </div>
        </div>
    </body>
</html>
