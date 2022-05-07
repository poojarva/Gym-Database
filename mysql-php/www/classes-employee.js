$(document).ready(function(){
	
	$('#table-classes').DataTable({
		"dom": 'Blfrtip',
		"ordering": false,
		"searching": false,
		"paging": false,
		"responsive": true,
		"ajax":{
			url:"classes-employee-action.php",
			type:"POST",
			data:{
					action:'listClasses'
				 },
			dataType:"json"
		}
	});
	
});