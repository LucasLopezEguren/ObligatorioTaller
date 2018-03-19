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
                        <tr>
                            <td>Especie</td>
                            <td>Total</td>
                            <td>Abiertos</td>
                            <td>Cerrados</td>
                            <td>Exitoso</td>
                            <td>Sin éxito</td>
                        </tr>
                        {foreach from=$listadoEstadisticas item=est}
                            <tr>
                                <td>{$est['Animal']}</td>
                                <td>{$est['Total']}</td>
                                <td>{$est['Abiertos']}</td>
                                <td>{($est['Total']-$est['Abiertos'])}</td>
                                {if($est['Exitosos'] neq "")}
                                    <td>{$est['Exitosos']}</td>
                                {else}
                                    <td>0</td>
                                {/if}
                                <td>{($est['Total']-$est['Abiertos'])-$est['Exitosos']}</td>
                            </tr>
                        {/foreach}
                    </table>                    
                </div>
            </div>
        </div>            
    </body>
</html>
