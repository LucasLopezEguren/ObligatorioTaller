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
    traigoUsuarios(pagina);
}

function irPaginaNro(){
    var pag = $(this).val();
    pagina = pag;
    traigoUsuarios(pagina);
}

function primeraPagina(){
    pagina = 1;
    traigoUsuarios(pagina);
}

function ultimaPagina(){
    pagina = ultPag;
    traigoUsuarios(pagina);
}

function anteriorPagina(){
    if(pagina > 1){
        pagina--;
    }
    else{
        pagina = ultPag;
    }
    traigoUsuarios(pagina);
}

function siguientePagina(){
    if(pagina < ultPag){
        pagina++;
    }
    else{
        pagina = 1;
    }
    traigoUsuarios(pagina);
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
    traigoUsuarios(pagina);
}

function traigoUsuarios(pagina){
    $.ajax({
        url: "traigoUsuarios.php",
        type: "POST",
        dataType: "json",
        data: "pagina=" + pagina + "&filtro=" + $("#txtFiltro").val(),
        success: cargoFilas
    });    
}

function cargoFilas(datos){
    var lineas = 1;
    if(datos['estado'] == "OK"){
        ultPag = datos['totPaginas'];
        $("#usuarios").empty();
        usuarios = datos["data"];
        for(pos = 0; pos <= usuarios.length-1; pos++){
            usuario = usuarios[pos];
            fila = "<tr>";
            fila += "<td>" + usuario['usuUsuario'] + "</td>";
            fila += "<td>" + usuario['usuCorreo'] + "</td>";
            fila += "<td>" + usuario['deptoNom'] + "</td>";
            fila += "<td>" + usuario['locNom'] + "</td>";
            foto = usuario['usuFoto'];
            if(usuario['usuFoto'] == ""){
                foto = "imagenes/vacio.png";
            }
            fila += "<td><img src='" + foto + "' width='40px'></td>";
            fila += "<td>";
            fila += "<input type='button' class='borrar' value='Borrar' alt='" + usuario['usuId'] +"'>";
            fila += "<input type='button' class='modif' value='Modificar' alt='" + usuario['usuId'] +"'>";
            fila += "</td>";
            fila += "</tr>";
            $("#usuarios").append(fila);
            lineas++;
        }
        for(pos=lineas; pos<=cantidadXpagina; pos++){
            $("#usuarios").append("<tr><td colspan='6'>&nbsp;</td></tr>");
        }
        $("#pagActual").html("<b>" + pagina + "/" + ultPag + "</b>")
        $(".borrar").click(procesoBorrar);
        $(".modif").click(procesoModif);
    }
    else{
        alert(datos['mensaje']);
    }
}