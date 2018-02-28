//Listas
var empresas = [];
var solicitudes = [];		  
var usuarios = [];
var largoUsr = 0;
var largoSol = 0;

$(document).ready(inicializo);

function inicializo(){


$(".noVoid").blur(function(){
	notVoid($(this).attr("id"));
});
$(".isNum").blur(function(){
	esNum($(this).attr("id"));
});
$(".btn").mouseover(mouseIn);
$(".btn").mouseout(mouseOut);
}

function regUsr () {
	
	var nombre = $('#usuNombre').val();
	var apellido = $('#cvApellido').val();
	var edad = parseInt($('#cvEdad').val());
	var gender = $("#cvMale").prop('checked');
	var exp = parseInt($('#cvExp').val());
	var word = $('#cvWord').prop('checked');
	var excel = $('#cvExcel').prop('checked');
	var pp = $('#cvPp').prop('checked');
	var acces = $('#cvAccess').prop('checked');
	var mail = $('#cvCe').prop('checked');
	var internet = $('#cvInternet').prop('checked');
	
	var boolNombre = notVoid('usuNombre');
	var boolApellido = notVoid('cvApellido');
	var boolEdad = esNum('cvEdad');
	var boolExp = esNum('cvExp');
	var boolEdadExp = (exp+17)<edad;
	var boolGender = (($("#cvMale").prop('checked')) ||( $("#cvFemale").prop('checked')));
	var boolProgs = ($("#cvSi").prop('checked')) || ($("#cvNo").prop('checked'));
	
	
	if(!boolNombre && !boolApellido && !boolEdad && boolGender && boolProgs && !boolExp && boolEdadExp){
		var usr = [nombre,apellido,edad,gender,exp,word,excel,pp,acces,mail,internet];
		usuarios.push(usr);
		alert("Ha quedado registrado.");
		largoUsr++;
	} else {
		alert("Alguno de los campos no esta correctamente completado o falta marcar alguna de las opciones necesarias.");
	}
}

function mouseIn() {
	var imagen = "";
	imagen = $(this).attr("id");
	$(this).css("border","solid grey 2px");
}

function mouseOut() {
	var imagen = "";
	imagen = $(this).attr("id");
	$(this).css("border","solid transparent 2px");
}

function notVoid (id) {
	var esVoid = true;
	esVoid = $("#"+id).val().length == 0;
	if($("#"+id).val().length == 0){
		$("#err"+id).html("<img id='img"+id+"' src ='imagenes/error.png' height='20' width='20'><strong class='error'>No puede quedar vacío</strong>");	
	} else {		
		$("#err"+id).html("<img id='img"+id+"' src='imagenes/ok.png' height='20' width='20'>");
	}
	return esVoid;
}

