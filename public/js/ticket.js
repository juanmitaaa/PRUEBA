$(function() {
	var purchase_at = $('#purchase_at').val();
	if (typeof purchase_at !== 'undefined' && purchase_at.length > 0){
	 
    	var date2 = new Date(purchase_at);
		 
		$("#purchase_at").datepicker({
        	dateFormat: 'dd/mm/yy'
    	}).datepicker("setDate", date2);
	}
	else{
		$("#purchase_at").datepicker();
	}
	$("#purchase_at").datepicker();
	var listTable = $('#listado-tickets').DataTable({
		"language": {
		  "url": langDatatable
		},
    	"scrollX": true,
		"lengthMenu": [[10, 25, 50, -1], [8, 25, 50, "All"]],
		"pageLength": 50,
		"order": [[ 0, "asc" ]],		
		"columnDefs": [
		    { targets: [4,5,6], render: $.fn.dataTable.render.moment('YYYY-MM-DD HH:mm:ss', 'DD/MM/YYYY HH:mm:ss' ) }
		  ],
		select: {
		    style:    'os',
		    selector: 'td:first-child'
		}, 
		
	});
	 

	$('.destroy').click(function(event){
		 
		var ok = confirm('Are you sure');
		var ticket = $(this).data('ticket');
		var route = baseurl+'/tickets/'+ticket;
		
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': _token},
			type: "POST",
	        data:{
	         _method:"DELETE"
	        },
			dataType: 'json',
			success: function(data){
				alert("ticket success delete");
				document.location.reload();
			},
            error: function(data) {
                alert("NO");
            }
		});
		return false;
	});
});