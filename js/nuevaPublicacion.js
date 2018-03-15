$(document).ready(inicializo);

function inicializo(){
    $("#especies").change(cargarRazas);
}

function cargarRazas(){
    var espId = $("#especies").val();

//    alert("entre!");
    $.ajax({
        url: "traigoRazas.php",
        type: "POST",
        dataType: "json",
        data: "especie=" + espId,
        success: procesoRazas,
        error: procesoError,
        timeout: 4000
    });
}

function procesoRazas(datos){
    if(datos['estado']=="OK"){
        razas = datos['data'];
        $("#razas").empty();
        for(pos=0; pos<=razas.length-1; pos++){
            raza = razas[pos];
            $("#razas").append("<option value='" + raza['id'] + "'>" + raza['nombre'] + "</option>")
        }      
    }
    else{
        alert(datos['mensaje']);
    }

}

function procesoError(){
    alert("Se encontro un error procesando la consulta");
}