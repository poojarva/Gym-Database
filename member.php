<html>
<head>
<title>Gym Database - Members</title>
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

<script src="member.js"></script>
<style>

.background {
background-image: url('background.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}


</style>
<!-- CSS for datatables buttons -->
</head>

<?php require_once('connection.php'); ?>

<body class="background">

<div class="container-fluid mt-3 mb-3">
	<h4 style="color: white; font-size:16px">Members</h4>
	
	<div class="pb-3">
		<button type="button" id="addMember" class="btn btn-primary btn-sm">Add Member</button>
	</div> 
        	
	<div>
		<table id="table-members" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th style="color: white">ID</th>
					<th style="color: white">First Name</th>
					<th style="color: white">Last Name</th>
					<th style="color: white">Location ID</th>
					<th style="color: white">Location Name</th>
					<th style="color: white">Email</th>
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
					<h4 class="modal-title">Edit Member</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">

						<label>First name</label><input type="text" class="form-control" id="first_name" placeholder="Enter first name" required>
						
						<label>Last name</label> <input type="text" class="form-control" id="last_name" placeholder="Enter last name" required>
						
						<label>Email</label> <input type="text" class="form-control" id="email" placeholder="Enter email" required>
												
						<label>Location ID</label>
						<select class="form-control" id="location_id">
            			    <?php
            			        $sqlQuery = "SELECT location_id, location_name FROM location ORDER BY location_name ASC";
            			        $stmt = $conn->prepare($sqlQuery);
            			        $stmt->execute();
            			        while ($row = $stmt->fetch()) {
            			            echo "<option value=\"" . $row["location_id"] . "\">" . $row["location_name"] . "</option>";
            			        }
                            ?>
            			</select>
            			
            			
            			<label>Password</label> <input type="password" class="form-control" id="password" placeholder="Enter password" required>
            			
            			

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