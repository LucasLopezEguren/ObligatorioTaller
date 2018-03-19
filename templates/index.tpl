<html>
    <head>
        <meta charset="UTF-8">
        <title>Mascotas APP</title>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>            
        <script type="text/javascript" src="js/publicaciones.js"></script>     
    </head>
    <body>
        {include file="cabezal.tpl"} 
        <div id="cuerpo">
            <div style="float: left">
                {include file="menu.tpl"}
            </div>
            <div style="float: left;" align-content: center class="contenedor">
                <h1>Bienvenido</h1>
                <div style="float: left;" align-content: center>
                    <h3>Publicaciones</h3>
                    <br>
                    Buscar: <input type="text" id="txtFiltro"/>                 
                    <input type="button" value="Filtrar" id="btnFiltrar"/>
                    <br>
                    <select id="cboxBarrio" nombre="cboxBarrio">
                        <option value="%" >Cualquier barrio</option>
                        {foreach from=$barrios item=barrio}
                            <option value="{$barrio['id']}" >{$barrio['nombre']}</option>
                        {/foreach}
                    </select>
                    <select id="cboxTipo">
                        <option value="%">Cualquier tipo</option>
                        <option value="E" >Encontrado</option>
                        <option value="P" >Perdido</option>
                    </select>
                    <select id="cboxEspecie" nombre="cboxEspecie">
                        <option value="%" >Cualquier especie</option>
                        {foreach from=$especies item=especie}
                            <option value="{$especie['id']}" >{$especie['nombre']}</option>
                        {/foreach}
                    </select>
                    <select id="cboxRaza">
                        <option value="%" >Cualquier raza</option>
                    </select>
                    <br>
                    <input type="button" value="PRIMERO" class="btnINI">
                    <input type="button" value="ANTERIOR" class="btnANT">
                    <span id="pagActualTop"></span>
                    <input type="button" value="SIGUIENTE" class="btnSIG">
                    <input type="button" value="ÚLTIMO" class="btnFIN">
                    <br>
                    <table>                    
                        <thead>
                            <tr>
                                <td>Titulo</td>
                                <td>Descripcion</td>
                            </tr>
                        </thead>                    
                        <tbody id="publicaciones">                      
                        </tbody>
                    </table>
                    <input type="button" value="PRIMERO" class="btnINI">
                    <input type="button" value="ANTERIOR" class="btnANT">
                    <span id="pagActualBot"></span>
                    <input type="button" value="SIGUIENTE" class="btnSIG">
                    <input type="button" value="ÚLTIMO" class="btnFIN">
                    <script type="text/javascript">
                        var cantidadXpagina = {$smarty.const.CANTXPAG};
                    </script>
                </div>
            </div>
        </div>
    </body>
</html>
