$(document).ready(inicializo);

var pagina = 1;
var ultPag = 0;

function inicializo(){
    $("#btnANT").click(anteriorPagina);
    $("#btnSIG").click(siguientePagina);
    $("#btnINI").click(primeraPagina);
    $("#btnFIN").click(ultimaPagina);
    $(".irPagina").click(irPaginaNro);
    $("#btnFiltrar").click(aplicarFiltro);
    cargoPublicaciones();
}

function aplicarFiltro(){
    pagina=1;
    traigoPublicaciones(pagina);
}

function irPaginaNro(){
    var pag = $(this).val();
    pagina = pag;
    traigoPublicaciones(pagina);
}

function primeraPagina(){
    pagina = 1;
    traigoPublicaciones(pagina);
}

function ultimaPagina(){
    pagina = ultPag;
    traigoPublicaciones(pagina);
}

function anteriorPagina(){
    if(pagina > 1){
        pagina--;
    }
    else{
        pagina = ultPag;
    }
    traigoPublicaciones(pagina);
}

function siguientePagina(){
    if(pagina < ultPag){
        pagina++;
    }
    else{
        pagina = 1;
    }
    traigoPublicaciones(pagina);
}


function cargoPublicaciones(){
    traigoPublicaciones(pagina);
}

function traigoPublicaciones(pagina){
    $.ajax({
        url: "traigoPublicaciones.php",
        type: "POST",
        dataType: "json",
        data: "pagina=" + pagina + "&filtro=" + $("#txtFiltro").val() + "&estado=" + $("#cboxEstado").val(),
        success: cargoFilas
    });    
}

function cargoFilas(datos){
    var lineas = 1;
    if(datos['estado'] == "OK"){
        ultPag = datos['totPaginas'];
        $("#publicaciones").empty();
        publicaciones = datos["data"];
        largo = publicaciones.length-1;
        for(pos = 0; pos <= largo; pos=pos+1){
            publicacion = publicaciones[pos];
            fila = "<tr>";
            fila += "<td class='celdaPublicacionesTitulo'>" + publicacion['titulo'] + "</td>";
            fila += "<td class='celdaPublicacionesDesc'>" + publicacion['descCorta'] + "</td>";
            fila += "</tr>";
            
            $("#publicaciones").append(fila);
         lineas++;
        }
        for(pos=lineas; pos<=2; pos++){
            $("#publicaciones").append("<td class='celdaPublicacionesTitulo'></td>");
        }
        $("#pagActual").html("<b>" + pagina + "/" + ultPag + "</b>")
    }
    else{
        alert(datos['mensaje']);
    }
}