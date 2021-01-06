/*=============================================
=            Sidebar menu           =
=============================================*/

// $('.sidebar-menu').tree();


/*=============================================
=            Data Table           =
=============================================*/

$(".tablas").DataTable({

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
INPUT-MASKS
=============================================*/
//Datemask dd/mm/yyyy
$('.fechas').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
//Telephone US mask
$('.tel-mask').inputmask('(999) 999-9999', { 'placeholder': '(999) 999-9999' }); 


/*=============================================
ICHECK ESTILOS PARA SELECTORES Y BOTONES RADIO
=============================================*/
 //iCheck for checkbox and radio inputs
 $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
	checkboxClass: 'icheckbox_minimal-blue',
	radioClass   : 'iradio_minimal-blue'
  });


/*=============================================
Initialize all tooltips
=============================================*/
$('[data-toggle="tooltip"]').tooltip();


/*=============================================
Limpiar formulario
=============================================*/
$("#btnLimpiar").click(function(event) {
	let idFormulario = $("form").attr("id");
	//console.log(idFormulario);
	$(`#${idFormulario}`)[0].reset();
});


/*function limpiar_formulario() {
	document.getElementByID("limipiarFormulario").reset();
}*/


