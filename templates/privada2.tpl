<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi primer APP</title>
    </head>
    <body>
        {include file="cabezal.tpl"}
        
        <div style="float: left">
            {include file="menu.tpl"}
        </div>
        <div style="float: right; align-content: center">
                <h1>Area de Datos</h1>
                {$valores[0]} - {$valores[1]} - {$valores[2]} - {$valores[3]}
                <hr>
                <table>
                    {foreach from=$datos key=mes item=valor}
                        <tr>
                            <td>{$mes}</td><td>{$valor}</td>
                        </tr>
                    {/foreach}
                </table>
                <hr>
                {foreach from=$personas item=persona}
                    <p><b>Nombre:</b>{$persona['nombre']}, 
                        <b>Correo:</b>{$persona['correo']}, 
                        <b>Edad:</b>{$persona['edad']}</p>
                {/foreach}
        </div>
    </body>
</html>
