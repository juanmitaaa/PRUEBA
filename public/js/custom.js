$(function() {
	//$(".chosen-select").chosen({no_results_text: "Sin resultados",placeholder_text_single:"Seleccione una opción"}); 
	$('.select2').select2();
	$('.select2long').select2({minimumInputLength: 2});//con muchos datos
	$.datepicker.regional['es'] = {
		 closeText: 'Cerrar',
		 prevText: '< Ant',
		 nextText: 'Sig >',
		 currentText: 'Hoy',
		 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		 weekHeader: 'Sm',
		 dateFormat: 'dd/mm/yy',
		 firstDay: 1,
		 isRTL: false,
		 showMonthAfterYear: false,
		 yearSuffix: ''
	};
	$.datepicker.setDefaults($.datepicker.regional['es']);
	//$( ".datepicker" ).datepicker({minDate: 0}).datepicker("setDate", 'today');
	
	if(showmessage == 1){
	 	$('#dialog-message').removeClass('hidden');
     	     
	}
	else{
		$('#dialog-message').addClass('hidden');    
	}
	$('#btnCloseMessage').click(function(){
		$('#dialog-message').addClass('hidden'); 
	});
});