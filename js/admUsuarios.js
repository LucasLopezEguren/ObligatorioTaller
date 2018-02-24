$(document).ready(inicializo);

function inicializo(){
    $(".borrar").click(procesoBorrar);
    $(".modif").click(procesoModif);
    $("#alta").click(procesoAlta);
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