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
            <h1>Administracion de Usuarios</h1>
            <div style="float: left;" align-content: center>
                <input type="button" id="alta" value="Agregar Usuario">
                <br>
                <table>
                    <tr>
                        <td>Usuario</td>
                        <td>Correo</td>
                        <td>Acciones</td>
                    </tr>
                    {foreach from=$usuarios item=usuario}
                        <tr>
                            <td>{$usuario['nombre']}</td>
                            <td>{$usuario['email']}</td>
                            <td>
                                {if $usuario['email'] neq "admin"}
                                    <input type="button" class="borrar" value="Borrar" alt="{$usuario['id']}">
                                    <input type="button" class="modif" value="Modificar" alt="{$usuario['id']}">
                                {/if}
                            </td>
                        </tr>                        
                    {/foreach}
                </table>
            </div>
        </div>
    </body>
</html>
