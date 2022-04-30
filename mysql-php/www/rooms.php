<html>
<head>
<title>Classes</title>
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

</body>
</html>
