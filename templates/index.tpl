<html>
    <head>
        <meta charset="UTF-8">
        <title>Mascotas APP</title>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>            
        <script type="text/javascript" src="js/publicaciones.js"></script>     
    </head>
    <body>
        {include file="cabezal.tpl"}
        
        <div style="float: left">
            {include file="menu.tpl"}
        </div>
        <div style="float: left;" align-content: center>
            <h1>Bienvenido a Mascotas APP</h1>
            <div style="float: left;" align-content: center>
                <h3>Publicaciones</h3>
                <br>
                Buscar: <input type="text" id="txtFiltro"/>
                <input type="button" value="Filtrar" id="btnFiltrar"/>
                <br/>
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
                <input type="button" value="PRIMERO" id="btnINI">
                <input type="button" value="ANTERIOR" id="btnANT">
                <input type="button" value="1" class="irPagina">
                <span id="pagActual"></span>
                <input type="button" value="3" class="irPagina">
                <input type="button" value="SIGUIENTE" id="btnSIG">
                <input type="button" value="ÚLTIMO" id="btnFIN">
            </div>
        </div>
    </body>
</html>
