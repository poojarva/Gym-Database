$(document).ready(function(){
	
	$('#table-classes').DataTable({
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
			url:"classes-employee-action.php",
			type:"POST",
			data:{
					action:'listClasses'
				},
			dataType:"json"
		}
	});	
	
	
	$("#addClass").click(function(){
		$('#member-form')[0].reset();
		$('#member-modal').modal('show');
		$('.modal-title').html("Add Class");
		$('#action').val('addClass');
		$('#save').val('Add');
	});
	
	
});