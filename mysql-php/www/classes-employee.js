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
	
		$("#member-modal").on('submit','#member-form', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		$.ajax({
			url:"classes-employee-action.php",
			method:"POST",
			data:{
				ID: $('#class_id').val(),
				first_name: $('#class_name').val(),
				last_name: $('#limit_capacity').val(),
				email: $('#max_limit').val(),
				location_id: $('#class_length').val(),
				password: $('#employee_id').val(),
				action: $('#action').val(),
			},
			success:function(){
				$('#member-modal').modal('hide');
				$('#member-form')[0].reset();
				$('#save').attr('disabled', false);
				tableClasses.ajax.reload();
			}
		})
	});		
	
	$("#table-classes").on('click', '.update', function(){
		var ID = $(this).attr("emp_id");
		var action = 'getClass';
		$.ajax({
			url:'classes-employee-action.php',
			method:"POST",
			data:{ID:ID, action:action},
			dataType:"json",
			success:function(data){
				$('#member-modal').modal('show');
				$('#ID').val(ID);
				$('#class_name').val(data.class_name);
				$('#limit_capacity').val(data.limit_capacity);
				$('#max_limit').val(data.max_limit);
				$('#class_length').val(data.class_length);
				$('#employee_id').val(data.employee_id);
				$('.modal-title').html("Edit Class");
				$('#action').val('updateClass');
				$('#save').val('Save');
			}
		})
	});
	
	
	
});