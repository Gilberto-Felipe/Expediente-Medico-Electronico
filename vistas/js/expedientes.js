/*=============================================
CARGAR LA TABLA DINÁMICA DE EXPEDIENTES
=============================================*/
/* COMPRUEBA CONEXIÓN CON datatable-expedientes.ajax.php
$.ajax({
	url: 'ajax/datatable-expedientes.ajax.php',
	success: function (respuesta){
		console.log(respuesta);		
	}
});*

/*=============================================
CONFIGURANDO DATATABLE
=============================================*/
$('.tablaExpedientes').DataTable( {

    "ajax": "ajax/datatable-expedientes.ajax.php",
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}
		
	}

});


/*=============================================
Probando campos de fechas y teléfonos
=============================================*/
$('.fechas').on('change', function() { 
    console.log(this.value); 
});
$('.tel_mask').on('change', function() { 
    console.log(this.value); 
});


/*=============================================
MANDAR ID_PACIENTE POR AJAX A ver-expediente.php

$(".tablaExpedientes").on("click", ".btnVerExpediente", function(){

    let idExpediente = $(this).attr("idExpediente");
	console.log("TCL: idExpediente", idExpediente);

	if (idExpediente) {
		window.location = "ver-expediente?idExpediente="+idExpediente;
	}
	
	let datos = new FormData();
	datos.append('idExpediente', idExpediente);
    
	$.ajax({
		url: 'vistas/modulos/ver-expediente.php',
		method: 'POST',
		data: datos,
		cache: false, 
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function(respuesta){

			console.log("TCL: respuesta OK ", respuesta);
			window.location = 'ver-expediente';
			//$(".id_paciente").val(respuesta["id_paciente"]);
			console.log("HOLA SOY ",respuesta);
			
		}

	});
    
});
=============================================*/


/*=============================================
MANDAR POR GET ID_PACIENTE A ver-expediente.php
=============================================*/
$(".tablaExpedientes").on("click", ".btnVerExpediente", function(){

    let idExpediente = $(this).attr("idExpediente");
	console.log("TCL: idExpediente", idExpediente);

	if (idExpediente) {
		window.location = "index.php?ruta=ver-expediente&idExpediente="+idExpediente;
	}

});

/*=============================================
MANDAR ID_CONSULTA POR GET A crear-consulta.php
=============================================*/
$(".tablaExpedientes").on("click", ".btnAgregarConsulta", function(){

    let idExpediente = $(this).attr("idExpediente");
	console.log("TCL: idExpediente", idExpediente);

	if (idExpediente) {
		window.location = "index.php?ruta=crear-consulta&idExpediente="+idExpediente;
	}

});

/*=============================================
MANDAR POR GET ID_PACIENTE A ver-consultas.php
=============================================*/
$("#irVerExpediente").click(function(event) {

	let idExpediente = $("#irVerExpediente").attr("idExpediente");
	console.log(idExpediente);

	if (idExpediente) {
		window.location = "index.php?ruta=consultas&idExpediente="+idExpediente;
	}
});

