<html>
<head>
<title>Classes</title>
<?php require_once('header.php'); ?>

<!-- Font Awesome library -->
<script src="https://kit.fontawesome.com/aec5ef1467.js"></script>

<!-- JS libraries for datatables buttons-->
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<script src="js/advanced-employee.js"></script>

<!-- CSS for datatables buttons -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"/>
</head>

<?php require_once('connection.php'); ?>

<body>

<div class="container-fluid mt-3 mb-3">
	<h4>Classes</h4>
	
<!-- 	<div class="pb-3"> -->
<!-- 	<button type="button" id="addClasses" class="btn btn-primary btn-sm">Add Classes</button> --> 
<!-- 	</div>  -->
        	
	<div>
		<table id="table-classes" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Class ID</th>
					<th>Class Name</th>
					<th>Class Limit</th>
					<th>Class Length</th>
					<th>Instructor First Name</th>
					<th>Instructor Last Name</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<!-- <div id="employee-modal" class="modal fade"> -->
<!-- 	<div class="modal-dialog"> -->
<!-- 		<form method="post" id="employee-form"> -->
<!-- 			<div class="modal-content"> -->
<!-- 				<div class="modal-header"> -->
<!-- 					<h4 class="modal-title">Edit Emploee</h4> -->
<!-- 				</div> -->
<!-- 				<div class="modal-body"> -->
<!-- 					<div class="form-group"> -->

<!-- 						<label>First name</label><input type="text" class="form-control" id="firstname" placeholder="Enter first name" required> -->
						
<!-- 						<label>Last name</label> <input type="text" class="form-control" id="lastname" placeholder="Enter last name" required> -->
						
<!-- 						<label>Email</label> <input type="text" class="form-control" id="email" placeholder="Enter email" required> -->
						
<!-- 						<label>Salary</label> <input type="number" class="form-control" min="0.01" step="0.01" size="8" value="0" id="salary"> -->
						
<!-- 						<label>Department</label> -->
<!-- 						<select class="form-control" id="department"> -->
            			    <?php
//             			        $sqlQuery = "SELECT department_ID, department_name FROM departments ORDER BY department_name ASC";
//             			        $stmt = $conn->prepare($sqlQuery);
//             			        $stmt->execute();
//             			        while ($row = $stmt->fetch()) {
//             			            echo "<option value=\"" . $row["department_ID"] . "\">" . $row["department_name"] . "</option>";
//             			        }
//                             ?>
<!--             			</select> -->
            			
<!--             			<label>Manager</label> -->
<!-- 						<select class="form-control" id="manager"> -->
            			    <?php
//             			        $sqlQuery = "SELECT employee_ID, concat(first_name, \" \", last_name) as `name` FROM employees ORDER BY `name` ASC";
//             			        $stmt = $conn->prepare($sqlQuery);
//             			        $stmt->execute();
//             			        while ($row = $stmt->fetch()) {
//             			            echo "<option value=\"" . $row["employee_ID"] . "\">" . $row["name"] . "</option>";
//             			        }
//                             ?>
<!--             			</select> -->
            			
<!--             			<label>Job</label> -->
<!-- 						<select class="form-control" id="job"> -->
            			    <?php
//             			        $sqlQuery = "SELECT job_ID, job_title FROM jobs ORDER BY `job_title` ASC";
//             			        $stmt = $conn->prepare($sqlQuery);
//             			        $stmt->execute();
//             			        while ($row = $stmt->fetch()) {
//             			            echo "<option value=\"" . $row["job_ID"] . "\">" . $row["job_title"] . "</option>";
//             			        }
//                             ?>
<!--             			</select> -->

<!-- 					</div> -->
<!-- 				</div> -->
<!-- 				<div class="modal-footer"> -->
<!-- 					<input type="hidden" name="ID" id="ID"/> -->
<!-- 					<input type="hidden" name="action" id="action" value=""/> -->
<!-- 					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" /> -->
<!-- 					<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button> -->
<!-- 				</div> -->
<!-- 			</div> -->
<!-- 		</form> -->
<!-- 	</div> -->
<!-- </div> -->

</body>
</html>