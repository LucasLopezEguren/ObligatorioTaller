$(document).ready(inicializo);

var pagina = 1;
var ultPag = 0;

function inicializo(){
    $(".btnANT").click(anteriorPagina);
    $(".btnSIG").click(siguientePagina);
    $(".btnINI").click(primeraPagina);
    $(".btnFIN").click(ultimaPagina);
    $("#btnFiltrar").click(aplicarFiltro);
    $("#cboxEspecie").change(cargarRazas);
    cargoPublicaciones();
}

function cargarRazas(){
    $.ajax({
        url: "traigoRazas.php",
        type: "POST",
        dataType: "json",
        data: "&especie=" + $("#cboxEspecie").val(),
        success: procesoRazas
    });
}

function procesoRazas(datos){
    if(datos['estado']=="OK"){
        razas = datos['data'];
        $("#cboxRaza").empty();
        $("#cboxRaza").append("<option value='%'>Cualquier raza</option>")
        for(pos=0; pos<=razas.length-1; pos++){
            raza = razas[pos];
            $("#cboxRaza").append("<option value='" + raza['id'] + "'>" + raza['nombre'] + "</option>")
        }  
    }
    else{
        alert(datos['mensaje']);
    }

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
        data: "pagina=" + pagina + "&filtro=" + $("#txtFiltro").val() + 
                "&tipo=" + $("#cboxTipo").val() +
                "&especie=" + $("#cboxEspecie").val() +
                "&raza=" + $("#cboxRaza").val() +
                "&barrio=" + $("#cboxBarrio").val(),
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
            fila = "";
            fila += "<tr>";
            fila += "<td class='celdaPublicacionesTitulo'><a href='publicacion.php?item=" + publicacion['id'] +"'>" + publicacion['titulo'] + "</a></td>";
            fila += "<td class='celdaPublicacionesDesc'>" + publicacion['descCorta'] + "</td>";
            foto = publicacion['pubFoto'];
            fila += "<td class='celdaPublicacionesTitulo'><img src='" + foto + "' height='100'></td>";
            fila += "</tr>";
            fila += "<tr><td colspan='3' align='center'>-------------------------";
            fila +="------------------------</td></tr>";
            $("#publicaciones").append(fila);
         lineas++;
        }
        for(pos=lineas; pos<=10; pos++){
            $("#publicaciones").append("<tr><td class='celdaPublicacionesTitulo'></td>");
            $("#publicaciones").append("<td class='celdaPublicacionesTitulo'></td></tr>");
        }
        $("#pagActualTop").html("<b>" + pagina + "/" + ultPag + "</b>")
        $("#pagActualBot").html("<b>" + pagina + "/" + ultPag + "</b>")
    }
    else{
        alert(datos['mensaje']);
    }
}