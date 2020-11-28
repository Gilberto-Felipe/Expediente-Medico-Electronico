/*=============================================
CARGAR LA TABLA DINÁMICA DE CONSULTAS
=============================================*/
/* COMPRUEBA CONEXIÓN CON datatable-consultas.ajax.php
$.ajax({
	url: 'ajax/datatable-consultas.ajax.php',
	success: function (respuesta){
		console.log(respuesta);		
	}
});*

/*=============================================
CONFIGURANDO DATATABLE
=============================================*/
$('.tablaConsultas').DataTable( {

    "ajax": "ajax/datatable-consultas.ajax.php",
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

$('.fechas').on('change', function() { 
    console.log(this.value); 
});
$('.tel_mask').on('change', function() { 
    console.log(this.value); 
});
=============================================*/


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
MANDAR ID_PACIENTE POR AJAX A ver-expediente.php
=============================================*/
$(".tablaConsultas").on("click", ".btnAgregarConsulta", function(){

    let idConsulta = $(this).attr("idConsulta");
	console.log("TCL: idConsulta", idConsulta);

	if (idConsulta) {
		window.location = "index.php?ruta=crear-consulta&idConsulta="+idConsulta;
	}

});