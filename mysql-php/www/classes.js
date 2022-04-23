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
			url:"classes.php",
			type:"POST",
			data:{
					action:'listClasses'
				},
			dataType:"json"
		},
		"columnDefs":[ {"targets":[0], "visible":false} ],
		"buttons": [
				{
					extend: 'excelHtml5',
					title: 'Classes',
					filename: 'Classes',
					exportOptions: {columns: [1,2,3,4,5,6]}
				},
				{
					extend: 'pdfHtml5',
					title: 'Classes',
					filename: 'Classes',
					exportOptions: {columns: [1,2,3,4,5,6]}
				},
				{
					extend: 'print',
					title: 'Classes',
					filename: 'Classes',
					exportOptions: {columns: [1,2,3,4,5,6]}
				}]
	});	
	
	// $("#addEmployee").click(function(){
	// 	$('#employee-form')[0].reset();
	// 	$('#employee-modal').modal('show');
	// 	$('.modal-title').html("Add Employee");
	// 	$('#action').val('addEmployee');
	// 	$('#save').val('Add');
	// });
	
	// $("#employee-modal").on('submit','#employee-form', function(event){
	// 	event.preventDefault();
	// 	$('#save').attr('disabled','disabled');
	// 	$.ajax({
	// 		url:"advanced-employee-action.php",
	// 		method:"POST",
	// 		data:{
	// 			ID: $('#ID').val(),
	// 			firstname: $('#firstname').val(),
	// 			lastname: $('#lastname').val(),
	// 			email: $('#email').val(),
	// 			salary: $('#salary').val(),
	// 			department: $('#department').val(),
	// 			manager: $('#manager').val(),
	// 			job: $('#job').val(),
	// 			action: $('#action').val(),
	// 		},
	// 		success:function(){
	// 			$('#employee-modal').modal('hide');
	// 			$('#employee-form')[0].reset();
	// 			$('#save').attr('disabled', false);
	// 			tableEmployee.ajax.reload();
	// 		}
	// 	})
	// });		
	
	// $("#table-employee").on('click', '.update', function(){
	// 	var ID = $(this).attr("emp_id");
	// 	var action = 'getEmployee';
	// 	$.ajax({
	// 		url:'advanced-employee-action.php',
	// 		method:"POST",
	// 		data:{ID:ID, action:action},
	// 		dataType:"json",
	// 		success:function(data){
	// 			$('#employee-modal').modal('show');
	// 			$('#ID').val(ID);
	// 			$('#firstname').val(data.first_name);
	// 			$('#lastname').val(data.last_name);
	// 			$('#email').val(data.email);
	// 			$('#salary').val(data.salary);
	// 			$('#department').val(data.department_ID);
	// 			$('#manager').val(data.manager_ID);
	// 			$('#job').val(data.job_ID);
	// 			$('.modal-title').html("Edit Employee");
	// 			$('#action').val('updateEmployee');
	// 			$('#save').val('Save');
	// 		}
	// 	})
	// });
	
	// $("#table-employee").on('click', '.delete', function(){
	// 	var ID = $(this).attr("emp_id");		
	// 	var action = "deleteEmployee";
	// 	if(confirm("Are you sure you want to delete this employee?")) {
	// 		$.ajax({
	// 			url:'advanced-employee-action.php',
	// 			method:"POST",
	// 			data:{ID:ID, action:action},
	// 			success:function() {					
	// 				tableEmployee.ajax.reload();
	// 			}
	// 		})
	// 	} else {
	// 		return false;
	// 	}
	// });
});