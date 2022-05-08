<html>
<head>
<title>Rooms</title>
<?php require_once('header.php'); ?>
<!-- My JS libraries -->
<script src="https://kit.fontawesome.com/aec5ef1467.js"></script>

<!-- JS libraries for datatables buttons-->
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="rooms.js"></script>
</head>

<?php require_once('connection-member.php'); ?>

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
