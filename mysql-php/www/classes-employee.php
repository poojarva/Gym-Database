<html>
<head>
<title>Classes</title>
<?php require_once('header.php'); ?>
<!-- My JS libraries -->
<script src="classes-employee.js"></script>
</head>

<?php require_once('connection-employee.php'); ?>

<body>

<div class="container-fluid mt-3 mb-3">
	<h4>Classes</h4>
	<div>
		<table id="table-classes" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Class ID</th> 
					<th>Class Name</th>
					<th>Current Class Limit</th>
					<th>Maximum Class Limit</th>
					<th>Class Length</th>
					<th>Instructor First Name</th>
					<th>Instructor Last Name</th>
					<th>Actions</th>
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

						
						<label>Class ID</label> <input type="number" class="form-control" id="class_id" placeholder="Enter Class ID" required>
						
						<label>Class Name</label><input type="text" class="form-control" id="class_name" placeholder="Enter Class name" required>
						
					    <label>Current Limit</label> <input type="text" class="form-control" id="limit_capacity" placeholder="Enter Current Limit for Class" required>						
						
						<label>Max Limit</label> <input type="text" class="form-control" id="max_limit" placeholder="Enter Maximum Limit for Class" required>						
						
						<label>Class Length</label> <input type="text" class="form-control" id="class_length" placeholder="Enter Length of Class" required>
						
						// need to add the instructor here
						<label>Instructors</label>
						<select class="form-control" id="instructor_id">
            			    <?php
            			        $sqlQuery = "SELECT i.employee_id as 'employee_id', CONCAT (u.first_name, ' ', u.last_name) as 'i_name'
                                    FROM instructor_classes i JOIN employees e
                                 USING (employee_id) JOIN users  u USING (username_id)";
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
