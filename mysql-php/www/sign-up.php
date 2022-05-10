<html>
<head>
<title>Gym Database</title>
<?php require_once('header.php'); ?>
</head>

<?php require_once('connection-new.php'); ?>

<body>

	<div class="container mt-3 mb-3">
		<form method="post">
			<div class="row justify-content-center">
				<div class="col-4">
				<div class="form-group">
						<label>First Name:</label>
						<input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name" required>
					</div>
					<div class="form-group">
						<label>Last Name:</label>
						<input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name" required>
					</div>
					<div class="form-group">
						<label>Email:</label>
						<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
					</div>
					<div class="form-group">
						<label>Location ID:</label>
						<select class="form-control" id="location_id" name="location_id" required>
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
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				<p>
				Already have an account? 
				<a href="login-member.php">Login here</a>.
				</p>
			</div>
		</form>
	</div>

</body>
</html>
	