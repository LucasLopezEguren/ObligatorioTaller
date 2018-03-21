$(document).ready(inicializo);

var pagina = 1;
var ultPag = 0;

function inicializo(){
    $(".btnANT").click(anteriorPagina);
    $(".btnSIG").click(siguientePagina);
    cargoFotos();
}

function anteriorPagina(){
    if(pagina > 1){
        pagina--;
    }
    else{
        pagina = ultPag;
    }
    traigoFotos(pagina);
}

function siguientePagina(){
    if(pagina < ultPag){
        pagina++;
    }
    else{
        pagina = 1;
    }
    traigoFotos(pagina);
}


function cargoFotos(){
    traigoFotos(pagina);
}

function traigoFotos(pagina){
    $.ajax({
        url: "verFotos.php",
        type: "POST",
        dataType: "json",
        data: "pagina=" + pagina + "&pubId=" + $("#pubIdFoto").val(),
        success: cargoFilas
    });    
}

function cargoFilas(datos){
    if(datos['estado'] == "OK"){
        ultPag = datos["totPaginas"];
        $("#pagActual").html("<b>" + pagina + "/" + ultPag + "</b>")
        fotos = datos["data"];
        largo = fotos.length;
        $("#vistaFotos").empty();
        fotos = datos["data"];
        largo = fotos.length;
        for(pos = 0; pos <= largo; pos=pos+1){
            foto = fotos[pos];
            fila = "";
            fila += "<tr>";
            rutaFoto = foto['pubFoto'];
            fila += "<td class='celdaPublicacionesTitulo'><img src='" + rutaFoto + "' height='200'></td>";
            fila += "</tr>";
            $("#vistaFotos").append(fila);
        }
        
    }
    else{
        alert(datos['mensaje']);
    }
}