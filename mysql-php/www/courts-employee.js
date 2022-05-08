$(document).ready(function(){
	
	var tableCourts = $('#table-courts').DataTable({
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
			url:"courts-employee-action.php",
			type:"POST",
			data:{
					action:'listCourts'
				},
			dataType:"json"
		}
	});	
	
	
	$("#addCourt").click(function(){
		$('#member-form')[0].reset();
		$('#member-modal').modal('show');
		$('.modal-title').html("Add Court");
		$('#action').val('addCourt');
		$('#save').val('Add');
	});
	
		$("#member-modal").on('submit','#member-form', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		$.ajax({
			url:"courts-employee-action.php",
			method:"POST",
			data:{
				ID: $('#ID').val(),
				court_type: $('#court_type').val(),
				limit_capacity: $('#limit_capacity').val(),
				max_limit: $('#max_limit').val(),
				location_id: $('#location_id').val(),
				action: $('#action').val(),
			},
			success:function(){
				$('#member-modal').modal('hide');
				$('#member-form')[0].reset();
				$('#save').attr('disabled', false);
				tableCourts.ajax.reload();
			}
		})
	});		
	
	$("#table-courts").on('click', '.update', function(){
	 var ID = $(this).attr("emp_id");
		var action = 'getCourt';
		$.ajax({
			url:'courts-employee-action.php',
			method:"POST",
			data:{ID:ID, action:action},
			dataType:"json",
			success:function(data){
				$('#member-modal').modal('show');
				$('#ID').val(ID);
				$('#court_type').val(data.court_type);
				$('#limit_capacity').val(data.limit_capacity);
				$('#max_limit').val(data.max_limit);
				$('#location_id').val(data.location_id);
				$('.modal-title').html("Edit Court");
				$('#action').val('updateCourt');
				$('#save').val('Save');
			}
		})
	});
	
	$("#table-courts").on('click', '.delete', function(){
		var ID = $(this).attr("emp_id");		
		var action = "deleteCourt";
		if(confirm("Are you sure you want to delete this court?")) {
			$.ajax({
				url:'courts-employee-action.php',
				method:"POST",
				data:{ID:ID, action:action},
				success:function() {					
					tableCourts.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});
	
	
	
	
});