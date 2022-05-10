<?php
// Include config file

// Define variables and initialize with empty values
$email = $password = $first_name = $last_name = "";
$location_id = 0;
$email_err = $password_err = $firstname_err = $lastname_err = $location_id_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate first_name
    if (empty(trim($_POST["first_name"]))) {
        $firstname_err = "Please enter your first name.";
    } else {
        $first_name = trim($_POST["first_name"]);
    }

    // Validate last_name
    if (empty(trim($_POST["last_name"]))) {
        $lastname_err = "Please enter your last name.";
    } else {
        $last_name = trim($_POST["last_name"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter a email.";
    } else {
        $email = trim($_POST["email"]);
        
        // Prepare a select statement
        $sql = "SELECT username_id FROM users WHERE email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $email);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) > 0) {
                    $email_err = "This email is already taken. Try another one!";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    }
    else {
        $password = trim($_POST["password"]);
    }
    
    if (empty(trim($_POST["location_id"]))) {
        $location_id_err = "Please choose a location.";
    }
    else {
        $location_id = trim($_POST["location_id"]);
    }
      

   
    }

    if (empty($email_err) && empty($password_err) && empty($firstname_err) && empty($lastname_err) && empty($location_id_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (first_name, last_name, email, password, type, location_id) VALUES (?, ?, ?, ?, ?, ?)";

        try {
        if ($stmt = mysqli_prepare($link, $sql)) {

            // Set parameters
            $p_email = $email;
            $p_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $p_firstname = $first_name;
            $p_lastname = $last_name;
            $p_locationid = $location_id;
            $p_type = 'Member';
            
          

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt,'sssss', $p_firstname, $p_lastname, $p_email, $p_password, $p_type, $p_locationid);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                        
                 echo "You have successfully become a member of our gym! Continue back to the home page and sign in!";
                header("location: index.php");
                
            } 
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

?>



<html>
<head>
<title>Gym Database</title>
<?php require_once('header.php'); ?>
</head>


<body>

	<div class="container mt-3 mb-3">
		<form method="post">
			<div class="row justify-content-center">
				<div class="col-4">
				<div class="form-group">
						<label>First Name</label>
						<input type="first_name" class="form-control" id="text" placeholder="Enter First Name" name="first_name" required>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="last_name" class="form-control" id="text" placeholder="Enter Last Name" name="last_name" required>
					</div>
					<div class="form-group">
						<label>Email:</label>
						<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
					</div>
				</div>
				<div class="form-group">
						<label>Location ID</label>
<!-- 					<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required> -->
						
						<select class="form-control" id="location_id" required>
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
            			
            			
            			<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Submit"> 
                            <input type="reset" class="btn btn-secondary ml-2" value="Reset">
						</div>
						<p>
							Already have an account? <a href="login.php">Login here</a>.
						</p>
			</div>
		</form>
	</div>

</body>
</html>