<html>
<head>
<title>Class</title>
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

<script src="classes.js"></script>

<style>

.background {
background-image: url('background.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

.text {

}
</style>
</head>

<?php require_once('connection-member.php'); ?>

<body class="background">

<div class="container-fluid mt-3 mb-3">
	<h4 style="color: white; font-size:16px">Classes</h4>
	
	<h6 style="color: white; font-size:12px">Reminder: Check the table below to see if you have already booked a spot in that room! 
	If you have already booked the class, the 'Current Class Limit' will not change - please unbook the class if you have already booked that class!</h6>

	<div>
		<table id="table-classes" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th style="color: white">Class ID</th> 
					<th style="color: white">Class Name</th>
					<th style="color: white">Class Current Limit</th>
					<th style="color: white">Class Max Limit</th>
					<th style="color: white">Class Length</th>
					<th style="color: white">Instructor First Name</th>
					<th style="color: white">Instructor Last Name</th>
					<th style="color: white">Actions</th>
					
				</tr>
			</thead>
		</table>
	</div>
</div>

<br>
<br>

<h6 style="color: white; font-size:12px" >Class That You Have Currently Booked</h6>
	<div>
		<table id="table-classes-booked" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th style="color: white">Class ID</th> 
					<th style="color: white">Class Type</th>
					<th style="color: white">Class Length</th>
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
					<h4 class="modal-title">Edit Rooms</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">

												
						<label>Room Type</label><input type="text" class="form-control" id="room_type" placeholder="Enter Room name" required>
						
					    <label>Current Limit</label> <input type="text" class="form-control" id="limit_capacity" placeholder="Enter the Limit (Same as Maximum)" required>						
						
						<label>Max Limit</label> <input type="text" class="form-control" id="max_limit" placeholder="Enter Maximum Limit for Room" required>						
												
					<label>Location ID</label>
						<select class="form-control" id="location_id">
            			    <?php
            			    global $conn;
            			    
            			        $sqlQuery = "SELECT location_id, location_name FROM location ORDER BY location_name ASC";
            			        $stmt = $conn->prepare($sqlQuery);
            			        $stmt->execute();
            			        while ($row = $stmt->fetch()) {
            			            echo "<option value=\"" . $row["location_id"] . "\">" . $row["location_name"] . "</option>";
            			        }
                            ?>
            			</select>
					
					
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