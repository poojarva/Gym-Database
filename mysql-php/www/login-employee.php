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

<?php require_once('connection-employee.php'); ?>


<body class="background">
	<div class="container mt-3 mb-3">
		<form method="post">
			<div class="row justify-content-center">
				<div class="col-4">
					<div class="form-group">
						<label>Email:</label>
						<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
					</br>
				</br>
					<center><p  style="color: white">
				Use the following credentials:
				email:  testemployee@gmail.com
				password: testemployee
				
				</p>
				</center>
				</div>
			</div>
		</form>
	</div>

</body>
</html>