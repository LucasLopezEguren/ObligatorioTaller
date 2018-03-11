$(document).ready(inicializo);

var pagina = 1;
var ultPag = 0;

function inicializo(){
    $("#alta").click(procesoAlta);
    $("#btnANT").click(anteriorPagina);
    $("#btnSIG").click(siguientePagina);
    $("#btnINI").click(primeraPagina);
    $("#btnFIN").click(ultimaPagina);
    $(".irPagina").click(irPaginaNro);
    $("#btnFiltrar").click(aplicarFiltro);
    cargoUsuarios();
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


function procesoModif(){
    var usuId = $(this).attr("alt");
    window.location = "modifUsuario.php?id=" + usuId;
}

function procesoBorrar(){
    var usuId = $(this).attr("alt");
    if(confirm("Desea borrar el usuario seleccionado?")){
        window.location = "borroUsuario.php?id=" + usuId;
    }
}

function procesoAlta(){
    window.location = "altaUsuario.php";
}

function cargoUsuarios(){
    traigoPublicaciones(pagina);
}

function traigoPublicaciones(pagina){
    $.ajax({
        url: "traigoPublicaciones.php",
        type: "POST",
        dataType: "json",
        data: "pagina=" + pagina + "&filtro=" + $("#txtFiltro").val(),
        success: cargoFilas
    });    
}

function cargoFilas(datos){
    if(datos['estado'] == "OK"){
        ultPag = datos['totPaginas'];
        $("#publicaciones").empty();
        publicaciones = datos["data"];
        largo = publicaciones.length-1;
        for(pos = 0; pos <= largo; pos=pos+1){
            publicacion = publicaciones[pos];
            fila = "<tr>";
            fila += "<td class='celdaPublicacionesTitulo'>" + publicacion['titulo'] + "</td>";
            fila += "<td class='celdaPublicacionesDesc'>" + publicacion['descripcion'] + "</td>";
            fila += "</tr>";
            
            $("#publicaciones").append(fila);
        }        
        $("#pagActual").html("<b>" + pagina + "/" + ultPag + "</b>")
    }
    else{
        alert(datos['mensaje']);
    }
}