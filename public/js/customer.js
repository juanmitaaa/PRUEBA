$(function() {
	var listTable = $('#listado-clientes').DataTable({
		"language": {
		  "url": langDatatable
		},
    	"scrollX": true,
		"lengthMenu": [[10, 25, 50, -1], [8, 25, 50, "All"]],
		"pageLength": 50,
		"order": [[ 0, "asc" ]],		
		"columnDefs": [
		    { targets: [6,7], render: $.fn.dataTable.render.moment('YYYY-MM-DD HH:mm:ss', 'DD/MM/YYYY HH:mm:ss' ) }
		  ],
		select: {
		    style:    'os',
		    selector: 'td:first-child'
		}, 
		
	});
	 

	$('.destroy').click(function(event){
		 
		var ok = confirm('Are you sure');
		var customer = $(this).data('customer');
		var route = baseurl+'/customers/'+customer;
		
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': _token},
			type: "POST",
	        data:{
	         _method:"DELETE"
	        },
			dataType: 'json',
			success: function(data){
				alert("customer success delete");
				document.location.reload();
			},
            error: function(data) {
                alert("NO");
            }
		});
		return false;
	});
});