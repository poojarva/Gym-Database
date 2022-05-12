<html>
<head>
<title>Rooms</title>
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

<script src="rooms-employee.js"></script>
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
	<h4 style="color: white; font-size:16px">Rooms</h4>
	
	<div class="pb-3">
		<button type="button" id="addRoom" class="btn btn-primary btn-sm">Add Room</button>
	</div> 
	
	<div>
		<table id="table-rooms" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th style="color: white">Room ID</th> 
					<th style="color: white">Room Type</th>
					<th style="color: white">Current Room Limit</th>
					<th style="color: white">Maximum Room Limit</th>
					<th style="color: white">Location</th>
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
