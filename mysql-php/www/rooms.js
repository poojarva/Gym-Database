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
	
	
	$("#addRoom").click(function(){
		$('#member-form')[0].reset();
		$('#member-modal').modal('show');
		$('.modal-title').html("Add Room");
		$('#action').val('addRoom');
		$('#save').val('Add');
	});
	
		$("#member-modal").on('submit','#member-form', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		$.ajax({
			url:"rooms-action.php",
			method:"POST",
			data:{
				ID: $('#ID').val(),
				room_type: $('#room_type').val(),
				limit_capacity: $('#limit_capacity').val(),
				max_limit: $('#max_limit').val(),
				location_id: $('#location_id').val(),
				action: $('#action').val(),
			},
			success:function(){
				$('#member-modal').modal('hide');
				$('#member-form')[0].reset();
				$('#save').attr('disabled', false);
				tableRooms.ajax.reload();
			}
		})
	});		
	
	$("#table-rooms").on('click', '.update', function(){
	 var ID = $(this).attr("emp_id");
		var action = 'getRoom';
		$.ajax({
			url:'rooms-action.php',
			method:"POST",
			data:{ID:ID, action:action},
			dataType:"json",
			success:function(data){
				$('#member-modal').modal('show');
				$('#ID').val(ID);
				$('#room_type').val(data.room_type);
				$('#limit_capacity').val(data.limit_capacity);
				$('#max_limit').val(data.max_limit);
				$('#location_id').val(data.location_id);
				$('.modal-title').html("Edit Room");
				$('#action').val('updateRoom');
				$('#save').val('Save');
			}
		})
	});
	
	$("#table-rooms").on('click', '.delete', function(){
		var ID = $(this).attr("emp_id");		
		var action = "deleteRoom";
		if(confirm("Are you sure you want to delete this room?")) {
			$.ajax({
				url:'rooms-action.php',
				method:"POST",
				data:{ID:ID, action:action},
				success:function() {					
					tableRooms.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});
	
	
	
	
});