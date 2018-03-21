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
        <div style="float: left; align-content: center">
            <h1>Ver Fotos</h1>

            <td>
                {foreach from=$fotosSecundarias item=fotoSec}
                    <img src='{$fotoSec['pubFoto']}' width="200px">
                {/foreach}
            </td>
        </div>
    </body>
</html>
