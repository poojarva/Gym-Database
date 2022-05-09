$(document).ready(function(){
	
		var tableClasses = $('#table-classes').DataTable({
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
			url:"classes-action.php",
			type:"POST",
			data:{
					action:'listClasses'
				},
			dataType:"json"
		}
	});	
	
	
	var tableClassesBooked = $('#table-classes-booked').DataTable({
		"dom": 'Blfrtip',
		"ordering": false,
		"searching": false,
		"paging": false,
		"responsive": true,
		"ajax":{
			url:"classes-action.php",
			type:"POST",
			data:{
					action:'listClassesBooked'
				 },
			dataType:"json"
		}
	});

	
		$("#member-modal").on('submit','#member-form', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		$.ajax({
			url:"classes-action.php",
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
				tableClasses.ajax.reload();
				tableClassesBooked.ajax.reload();
			}
		})
	});		
	
	$("#table-classes").on('click', '.update', function(){
var ID = $(this).attr("emp_id");		
		var action = "updateClass";
		if(confirm("Are you sure you want to book this class?")) {
			$.ajax({
				url:'classes-action.php',
				method:"POST",
				data:{ID:ID, action:action},
				success:function() {					
					tableClasses.ajax.reload();
					tableClassesBooked.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});
	
	
	$("#table-classes").on('click', '.delete', function(){
		var ID = $(this).attr("emp_id");		
		var action = "deleteClass";
		if(confirm("Are you sure you want to unbook this class?")) {
			$.ajax({
				url:'class-action.php',
				method:"POST",
				data:{ID:ID, action:action},
				success:function() {					
					tableClasses.ajax.reload();
				    tableClassesBooked.ajax.reload();

				}
			})
		} else {
			return false;
		}
	});
	
	
	
	
});