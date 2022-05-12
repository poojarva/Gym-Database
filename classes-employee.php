<html>
<head>
<title>Classes</title>
<?php require_once('header.php'); ?>
<!-- My JS libraries -->
<!-- Font Awesome library -->
<script src="https://kit.fontawesome.com/aec5ef1467.js"></script>

<!-- JS libraries for datatables buttons-->
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="classes-employee.js"></script>


<style>

.background {
background-image: url('background.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}


</style>
</head>

<?php require_once('connection-employee.php'); ?>


<body class="background">
<div class="container-fluid mt-3 mb-3">
		<h4 style="color: white; font-size:16px">Classes</h4>
	
	<div class="pb-3">
		<button type="button" id="addClass" class="btn btn-primary btn-sm">Add Class</button>
	</div> 
	
	<div>
		<table id="table-classes" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th style="color: white">Class ID</th> 
					<th style="color: white">Class Name</th>
					<th style="color: white">Current Class Limit</th>
					<th style="color: white">Maximum Class Limit</th>
					<th style="color: white">Class Length</th>
					<th style="color: white">Instructor First Name</th>
					<th style="color: white">Instructor Last Name</th>
					<th style="color: white">Actions</th>
				</tr>
			</thead>
		</table>
	</div>
</div>


<div id="member-modal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="member-form">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Classes</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">

						
<!-- 						<label>Class ID</label> <input type="number" class="form-control" id="class_id" placeholder="Enter Class ID" required> -->
						
						<label>Class Name</label><input type="text" class="form-control" id="class_name" placeholder="Enter Class name" required>
						
					    <label>Current Limit</label> <input type="text" class="form-control" id="limit_capacity" placeholder="Enter the Limit (Same as Maximum)" required>						
						
						<label>Max Limit</label> <input type="text" class="form-control" id="max_limit" placeholder="Enter Maximum Limit for Class" required>						
						
						<label>Class Length</label> <input type="text" class="form-control" id="class_length" placeholder="Example: 01:30:00 -> 1hr30min" required>
						
						<label>Instructors</label>
						<select class="form-control" id="employee_id">
            			    <?php
            			        $sqlQuery = "SELECT e.employee_id as 'employee_id', CONCAT (u.first_name, ' ', u.last_name) as 'i_name'
                                 FROM  employees e
                                 JOIN users  u USING (username_id)";
            			        $stmt = $conn->prepare($sqlQuery);
            			        $stmt->execute();
            			        while ($row = $stmt->fetch()) {
            			            echo "<option value=\"" . $row["employee_id"] . "\">" . $row["i_name"] . "</option>";
            			        }
                            ?>
            			</select>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="ID" id="ID"/>
					<input type="hidden" name="action" id="action" value=""/>
					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
					<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

</body>
</html>
