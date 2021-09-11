$(function() {
	var listTable = $('#listado-incidencias').DataTable({
		"language": {
		  "url": langDatatable
		},
    	"scrollX": true,
		"lengthMenu": [[10, 25, 50, -1], [8, 25, 50, "All"]],
		"pageLength": 50,
		"order": [[ 0, "asc" ]],		
		"columnDefs": [
		    { targets: [11,12], render: $.fn.dataTable.render.moment('YYYY-MM-DD HH:mm:ss', 'DD/MM/YYYY HH:mm:ss' ) }
		  ],
		select: {
		    style:    'os',
		    selector: 'td:first-child'
		}, 
		
	});
	 

	$('.destroy').click(function(event){
		 
		var ok = confirm('Are you sure');
		var incidence = $(this).data('incidence');
		var route = baseurl+'/incidences/'+incidence;
		
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': _token},
			type: "POST",
	        data:{
	         _method:"DELETE"
	        },
			dataType: 'json',
			success: function(data){
				alert("incidence success delete");
				document.location.reload();
			},
            error: function(data) {
                alert("NO");
            }
		});
		return false;
	});
});