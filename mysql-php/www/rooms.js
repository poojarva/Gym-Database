$(document).ready(function(){
	
		var tableRooms = $('#table-rooms').DataTable({
		"dom": 'Blfrtip',
		"autoWidth": false,
		"processing":true,
		"serverSide":true,
		"pageLength":15,
		"lengthMenu":[[15, 25, 50, 100, -1], [15, 25, 50, 100, "All"]],
		"responsive": true,
		"language": {processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>'},
		"order":[],
		"ajax":{
			url:"rooms-action.php",
			type:"POST",
			data:{
					action:'listRooms'
				},
			dataType:"json"
		}
	});	
	
	
});