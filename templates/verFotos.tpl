<html>
    <head>
        <meta charset="UTF-8">
        <title>Mascotas APP</title>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>            
        <script type="text/javascript" src="js/fotos.js"></script>            
    </head>
    <body>
        {include file="cabezal.tpl"}

        <div style="float: left">
            {include file="menu.tpl"}
        </div>
        <div style="float: left; align-content: center">
            <h1>Ver Fotos</h1>
            <br>
            <input type="hidden" name="pubId" id="pubId" value="{$pubId}">
            <input type="button" value="ANTERIOR" class="btnANT">
            <span id="pagActual"></span>
            <input type="button" value="SIGUIENTE" class="btnSIG">
            <br>
            <table>
                <tbody id="vistaFotos">
                </tbody>
            </table>
            <td>
                {foreach from=$listaFotos item=fotoSec}
                    <img src='{$fotoSec['pubFoto']}' width="200px">
                {/foreach}
            </td>
        </div>
    </body>
</html>
