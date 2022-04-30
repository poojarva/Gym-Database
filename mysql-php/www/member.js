$(document).ready(function(){
	
	var tableMember = $('#table-members').DataTable({
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
			url:"member-action.php",
			type:"POST",
			data:{
					action:'listMembers'
				},
			dataType:"json"
		}
	});	
	
	$("#addMember").click(function(){
		$('#member-form')[0].reset();
		$('#member-modal').modal('show');
		$('.modal-title').html("Add Member");
		$('#action').val('addMember');
		$('#save').val('Add');
	//	tableMember.ajax.reload();

	});
	
	$("#member-modal").on('submit','#member-form', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		$.ajax({
			url:"member-action.php",
			method:"POST",
			data:{
				ID: $('#ID').val(),
				first_name: $('#first_name').val(),
				last_name: $('#last_name').val(),
				email: $('#email').val(),
				password: $('#password').val(),
				location_id: $('#location_id').val(),
				action: $('#action').val(),
			},
			success:function(){
				$('#member-modal').modal('hide');
				$('#member-form')[0].reset();
				$('#save').attr('disabled', false);
			}
		})
	});		
	
	$("#table-members").on('click', '.update', function(){
		var ID = $(this).attr("emp_id");
		var action = 'getMember';
		$.ajax({
			url:'member-action.php',
			method:"POST",
			data:{ID:ID, action:action},
			dataType:"json",
			success:function(data){
				$('#member-modal').modal('show');
				$('#ID').val(ID);
				$('#first_name').val(data.first_name);
				$('#last_name').val(data.last_name);
				$('#email').val(data.email);
				$('#password').val(data.password);
				$('#location_id').val(data.location_id);
				$('.modal-title').html("Edit Member");
				$('#action').val('updateMember');
				$('#save').val('Save');
				tableMembers.ajax.reload();

			}
		})
	});
	
	$("#table-members").on('click', '.delete', function(){
		var ID = $(this).attr("emp_id");		
		var action = "deleteMember";
		if(confirm("Are you sure you want to delete this member?")) {
			$.ajax({
				url:'member-action.php',
				method:"POST",
				data:{ID:ID, action:action},
				success:function() {					
					tableMembers.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});
	
	
});