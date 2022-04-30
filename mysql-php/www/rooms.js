$(document).ready(function(){
	
	$('#table-rooms').DataTable({
		"dom": 'Blfrtip',
		"ordering": false,
		"searching": false,
		"paging": false,
		"responsive": true,
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