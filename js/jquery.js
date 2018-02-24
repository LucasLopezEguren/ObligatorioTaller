//Listas
var empresas = [];
var solicitudes = [];		  
var usuarios = [];
var largoUsr = 0;
var largoSol = 0;

$(document).ready(inicializo);

function inicializo(){

$("tr.cvProg").hide();
$("tr.solProg").hide();
$(".noVoid").blur(function(){
	notVoid($(this).attr("id"));
});
$(".isNum").blur(function(){
	esNum($(this).attr("id"));
});
$(".menus").hide();
$("#homeDiv").show();
$("#btnNoCal").click(noUtiles);
$("#home").click(cambiar);
$("#usuario").click(actualizar);
$("#usuario").click(cambiar);
$("#empresa").click(cambiar);
$("#buscar").click(postulados);
$(".cvProgramas").click(progs);
$(".solProgramas").click(progs);
$("#usr").click(regUsr);
$("#regEmp").click(regEmpr);
$("#regSol").click(regSoli);
$(".btn").mouseover(mouseIn);
$(".btn").mouseout(mouseOut);
}

function noUtiles () {
	$("#noCal").html(" ");
	var calificados =[];
	var cantCal= 0;
	for (var i=0;i<largoUsr;i++){
		var nombre = usuarios[i][0];
		var apellido = usuarios[i][1];
		var edad = usuarios[i][2];
		var gender = usuarios[i][3];
		var exp = usuarios[i][4];
		var word = usuarios[i][5];
		var excel = usuarios[i][6];
		var pp = usuarios[i][7];
		var acces = usuarios[i][8];
		var mail = usuarios[i][9];
		var internet = usuarios[i][10];
		var sirve = false;
		for (var j=0;j<largoSol;j++){
			//requerimientos
			var reqExp = solicitudes[j][1];
			var reqGenderImp = solicitudes[j][2];
			var reqGender = solicitudes[j][3];
			var reqMinEdad = solicitudes[j][4];
			var reqMaxEdad = solicitudes[j][5];
			var reqExcluyentes = solicitudes[j][6];
			var reqWord = solicitudes[j][7];
			var reqExcel = solicitudes[j][8];
			var reqPp = solicitudes[j][9];
			var reqAcces = solicitudes[j][10];
			var reqMail = solicitudes[j][11];
			var reqInternet = solicitudes[j][12];
			if ( (reqExp<=exp) && ((reqGenderImp) || ((reqGender&&gender) || (!reqGender&&!gender))) && (edad>=reqMinEdad && edad<=reqMaxEdad)){
				if (!reqExcluyentes){
					sirve = true;
				} else if(((reqWord&&word)||(!reqWord))&&((reqExcel&&excel)||(!reqExcel))&&((reqPp&&pp)||(!reqPp))&&((reqAcces&&acces)||(!reqAcces))&&((reqMail&&mail)||(!reqMail))&&((reqInternet&&internet)||(!reqInternet))){
					sirve = true;
				} 
			}
			
		}
		if (!sirve){
			$("#noCal").append("<tr><td>"+nombre+" "+apellido+"</td></tr>");
			cantCal++;
		}
	}
	if(cantCal==0){
		$("#noCal").append("<tr><td>no se han encontrado postulantes que</td></tr>");
		$("#empresaDiv").hide();
		$("#noCalifican").show();
	} else {
		$("#empresaDiv").hide();
		$("#noCalifican").show();
	}
}

function postulados () {
	$("#resultados").html(" ");
	var calificados =[];
	var cantCal= 0;
	var solicitud = $("#vacante").prop('selectedIndex');
	//requerimientos
		var nombre = solicitudes[solicitud][0];
		var reqExp = solicitudes[solicitud][1];
		var reqGenderImp = solicitudes[solicitud][2];
		var reqGender = solicitudes[solicitud][3];
		var reqMinEdad = solicitudes[solicitud][4];
		var reqMaxEdad = solicitudes[solicitud][5];
		var reqExcluyentes = solicitudes[solicitud][6];
		var reqWord = solicitudes[solicitud][7];
		var reqExcel = solicitudes[solicitud][8];
		var reqPp = solicitudes[solicitud][9];
		var reqAcces = solicitudes[solicitud][10];
		var reqMail = solicitudes[solicitud][11];
		var reqInternet = solicitudes[solicitud][12];
	
	for (var i=0;i<largoUsr;i++){
		var nombre = usuarios[i][0];
		var apellido = usuarios[i][1];
		var edad = usuarios[i][2];
		var gender = usuarios[i][3];
		var exp = usuarios[i][4];
		var word = usuarios[i][5];
		var excel = usuarios[i][6];
		var pp = usuarios[i][7];
		var acces = usuarios[i][8];
		var mail = usuarios[i][9];
		var internet = usuarios[i][10];
		if ( (reqExp<=exp) && ((reqGenderImp) || ((reqGender&&gender) || (!reqGender&&!gender))) && (edad>=reqMinEdad && edad<=reqMaxEdad)){
			if (!reqExcluyentes){
				cantCal++;
				calificados.push(nombre+" "+apellido);
				$("#resultados").append("<tr><td>"+nombre+" "+apellido+"</td></tr>");
			} else if(((reqWord&&word)||(!reqWord))&&((reqExcel&&excel)||(!reqExcel))&&((reqPp&&pp)||(!reqPp))&&((reqAcces&&acces)||(!reqAcces))&&((reqMail&&mail)||(!reqMail))&&((reqInternet&&internet)||(!reqInternet))){
				cantCal++;
				calificados.push(nombre+" "+apellido);
				$("#resultados").append("<tr><td>"+nombre+" "+apellido+"</td></tr>");
			}
		}
	}	
	if(cantCal==0){
		$("#resultados").append("<tr><td>no se han encontrado postulantes que</td></tr>");
		$("#empresaDiv").hide();
		$("#buscarDiv").show();
	} else {
		$("#empresaDiv").hide();
		$("#buscarDiv").show();
	}	
}

function regUsr () {
	
	var nombre = $('#cvNombre').val();
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
	
	var boolNombre = notVoid('cvNombre');
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

function actualizar () {
	var puntaje = [1, 1, 1, 1, 1, 1];
	for(var i=0; i<largoSol; i++){
		if (solicitudes[i][6]){
			if (solicitudes[i][7]){
				puntaje [0]=puntaje [0]+3;
			} else {
				puntaje [0]++;
			}
			if (solicitudes[i][8]){
				puntaje [1]=puntaje [1]+3;
			} else {
				puntaje [1]++;
			}
			if (solicitudes[i][9]){
				puntaje [2]=puntaje [2]+3;
			} else {
				puntaje [2]++;
			}
			if (solicitudes[i][10]){
				puntaje [3]=puntaje [3]+3;
			} else {
				puntaje [3]++;
			}
			if (solicitudes[i][11]){
				puntaje [4]=puntaje [4]+3;
			} else {
				puntaje [4]++;
			}
			if (solicitudes[i][12]){
				puntaje [5]=puntaje [5]+3;
			} else {
				puntaje [5]++;
			}
		}
	}
	$("#tblWord").html(puntaje [0]);	
	$("#tblExcel").html(puntaje [1]);
	$("#tblPP").html(puntaje [2]);	
	$("#tblAccess").html(puntaje [3]);	
	$("#tblMail").html(puntaje [4]);	
	$("#tblInternet").html(puntaje [5]);
}

function regSoli () {
	var nombre = $('#empresas').val();
	var exp = parseInt($('#exp').val());
	var genderImp = $("#noImp").prop('checked');
	var gender = $("#male").prop('checked');
	var edadMin = parseInt($('#minEdad').val());
	var edadMax = parseInt($('#maxEdad').val());
	var excluyente = $("#solSi").prop('checked');
	var word = $('#word').prop('checked');
	var excel = $('#excel').prop('checked');
	var pp = $('#pp').prop('checked');
	var acces = $('#access').prop('checked');
	var mail = $('#ce').prop('checked');
	var internet = $('#Internet').prop('checked');
		
	var boolNombre = nombre.length > 0;
	var boolExp = esNum('exp');
	var boolEdadMin = esNum('minEdad');
	var boolEdadMax = esNum('maxEdad');
	var boolEdad = edadMin < edadMax;
	
	var boolGender = (($("#male").prop('checked')) || ( $("#female").prop('checked')) || ( $("#noImp").prop('checked')));
	var boolProgs = ($("#solSi").prop('checked')) || ($("#solNo").prop('checked'));
	if(!boolExp && !boolEdadMin && !boolEdadMax && boolGender && boolProgs && boolEdad && boolNombre){
		var sol = [nombre,exp,genderImp,gender,edadMin,edadMax,excluyente,word,excel,pp,acces,mail,internet];
		solicitudes.push(sol);
		alert("Se ha creado una vacante.");
		largoSol++;
		$("#vacante").append("<option value='"+nombre+"'>"+nombre+"</option>");
	} else {
		alert("Alguno de los campos no esta correctamente completado o falta marcar alguna de las opciones necesarias.");
	}
}

function regEmpr () {
	var nombre = $('#empNombre').val();
	var dir = $('#empDir').val();
	var telefono = parseInt($('#empTel').val());
	
	var boolNombre = notVoid('empNombre');
	var boolDir = notVoid('empDir');
	var boolTelefono = esNum('empTel');
	
	if(!boolNombre && !boolDir && !boolTelefono){
		$("#empresas").append("<option value='"+$('#empNombre').val()+"'>"+$('#empNombre').val()+"</option>");
		var emp = [nombre,dir,telefono];
		empresas.push(emp);
		alert("Su empresa ha quedado registrada.");
	} else {
		alert("Alguno de los campos no esta correctamente completado o falta marcar alguna de las opciones necesarias.");
	}
	
}

function progs(){
	if ($("#cvSi").prop('checked')){
		$("tr.cvProg").show();
	} else {
		$("tr.cvProg").hide();
	}
	if ($("#solSi").prop('checked')){
		$("tr.solProg").show();
	} else {
		$("tr.solProg").hide();
	}

}

function cambiar(){
	var id = "";
	id = $(this).attr("id");
	$(".menus").hide();
	$("#"+id+"Div").show();		
}


function esNum (id) {
	if(($("#"+id).val().length == 0) || (isNaN($("#"+id).val()))){
		$("#err"+id).html("<img id='img"+id+"' src ='img/error.png' height='20' width='20'><strong class='error'>Debe ser un número</strong>");	
	} else {		
		$("#err"+id).html("<img id='img"+id+"' src='img/ok.png' height='20' width='20'>");
	}
	return ($("#"+id).val().length == 0) || (isNaN($("#"+id).val()));
}

function notVoid (id) {
	var esVoid = true;
	esVoid = $("#"+id).val().length == 0;
	if($("#"+id).val().length == 0){
		$("#err"+id).html("<img id='img"+id+"' src ='img/error.png' height='20' width='20'><strong class='error'>No puede quedar vacío</strong>");	
	} else {		
		$("#err"+id).html("<img id='img"+id+"' src='img/ok.png' height='20' width='20'>");
	}
	return esVoid;
}

