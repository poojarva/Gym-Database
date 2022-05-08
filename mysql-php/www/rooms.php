<html>
<head>
<title>Rooms</title>
<?php require_once('header.php'); ?>
<!-- My JS libraries -->
<script src="rooms.js"></script>
</head>

<?php require_once('connection.php'); ?>

<body>

<div class="container-fluid mt-3 mb-3">
	<h4>Rooms</h4>
	<div>
		<table id="table-rooms" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Room ID</th> 
					<th>Room Type</th>
					<th>Room Current Limit</th>
					<th>Room Max Limit</th>
					<th>Room Location</th>
					<th>Actions</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

</body>
</html>
