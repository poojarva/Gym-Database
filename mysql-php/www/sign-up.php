<html>
<head>
<title>Gym Database</title>
<?php require_once('header.php'); ?>
<style>

.background {
background-image: url('background.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}


</style>
</head>

<?php require_once('connection-new.php'); ?>

<body class="background">

	<div class="container mt-3 mb-3">
		<form method="post">
			<div class="row justify-content-center">
				<div class="col-4">
				<div class="form-group">
						<mark> <label>First Name:</label> </mark>
						<input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name" required>
					</div>
					<div class="form-group">
						<mark><label>Last Name:</label></mark>
						<input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name" required>
					</div>
					<div class="form-group">
						<mark><label>Email:</label></mark>
						<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
					</div>
					<div class="form-group">
						<mark><label>Password:</label></mark>
						<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
					</div>
					<div class="form-group">
						<mark><label>Location ID:</label></mark>
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
				<center><p  style="color: white">
				<mark>Already have an account? </mark>
				<a href="login-member.php"><mark> Login here</mark></a>
				</p>
							</br>
				</br>
				        <div class="copyright text-center text-white">
            Copyright © 2022
        </div>
				</center>
			</div>
		</form>
	</div>

</body>
</html>
	