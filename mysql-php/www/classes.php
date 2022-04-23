<html>
<head>
<title>Classes</title>
<?php require_once('header.php'); ?>
<!-- My JS libraries -->
<script src="classes.js"></script>
</head>

<?php require_once('connection.php'); ?>

<body>

<div class="container-fluid mt-3 mb-3">
	<h4>Employees</h4>
	<div>
		<table id="table-classes" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th> Class ID</th> 
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

<!-- <html> -->
<!-- <head> -->
<!-- <title>Classes</title> -->
// <?php 
// require_once('header.php');
// ?>

<!-- <!-- Font Awesome library --> -->
<!-- <script src="https://kit.fontawesome.com/aec5ef1467.js"></script> -->

<!-- <!-- JS libraries for datatables buttons--> -->
<!-- <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/pdfmake.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/vfs_fonts.js"></script> -->
<!-- <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script> -->

<!-- <script src="js/advanced-employee.js"></script> -->

<!-- <!-- CSS for datatables buttons --> -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"/> -->
<!-- </head> -->

// <?php 
// require_once('connection.php'); 
// ?>

<!-- <body> -->


<!-- <div class="container-fluid mt-3 mb-3"> -->
<!-- 	<h4>Classes</h4> -->
	
<!-- 	<div class="pb-3"> -->
<!-- 	<button type="button" id="addClasses" class="btn btn-primary btn-sm">Add Classes</button>  -->
<!-- 	</div>  -->
	
<!-- 	<form action="classes-action.php" method="GET"> -->
<!-- <input id="search" name="search" type="text" placeholder="Type here"> -->
<!-- <input id="submit" type="submit" value="Search"> -->
// <?php 

// global $conn;

// $class_name = ($_POST['search']);

// $searchQuery = ("SELECT c.class_id as 'Class_Id', c.class_name 'Class_Name',  c.limit_capacity as 'Limit', c.class_length as 'Class_Length',  u.first_name 'Instructor_First_Name', u.last_name as 'Instructor_Last_Name' FROM classes c JOIN instructor_classes ic USING (class_id) JOIN employees e USING (employee_id) JOIN users u USING (username_id) WHERE Class_Name LIKE '" + $class_name + ";");
// $stmt = $conn->prepare($searchQuery);
// $stmt->execute();
// $numberRows = $stmt->rowCount();

// while ($sqlRow = $stmt->fetch()) {
//      $dataRow1 = $sqlRow['Class_Id'];
//      $dataRow2 = $sqlRow['Class_Name'];
//      $dataRow3 = $sqlRow['Limit'];
//      $dataRow4 = $sqlRow['Class_Length'];
//      $dataRow5 = $sqlRow['Instructor_First_Name'];
//      $dataRow6 = $sqlRow['Instructor_Last_Name'];
//      $dataRow7 = '<button type="button" name="update" emp_id="' . $sqlRow["Class_Id"] . '" class="btn btn-warning btn-sm update">Update</button>
//                           <button type="button" name="delete" emp_id="' . $sqlRow["Class_Id"] . '" class="btn btn-danger btn-sm delete" >Delete</button>';
     
//      echo '<tr>
//                   <td>'.$numberRows.'</td>
//                   <td>'.$dataRow1.'</td>
//                   <td>'.$dataRow2.'</td>
//                   <td>'.$dataRow3.'</td>
//                   <td>'.$dataRow4.'</td>
//                   <td>'.$dataRow5.'</td>
//                   <td>'.$dataRow6.'</td>
//                   <td>'.$dataRow7.'</td>
//               </tr>';
//  }


//   ?>
<!-- </form> -->
        	
        	
<!-- 	<div> -->
<!-- 		<table id="table-classes" class="table table-bordered table-striped"> -->
<!-- 			<thead> -->
<!-- 				<tr> -->
<!-- 					<th>Class ID</th> -->
<!-- 					<th>Class Name</th> -->
<!-- 					<th>Class Limit</th> -->
<!-- 					<th>Class Length</th> -->
<!-- 					<th>Instructor First Name</th> -->
<!-- 					<th>Instructor Last Name</th> -->
<!-- 				</tr> -->
<!-- 			</thead> -->
			
			<?php
// 			global $conn;
			
// 			$sqlQuery = "SELECT c.class_id as 'Class_Id', c.class_name 'Class_Name',  c.limit_capacity as 'Limit', c.class_length as 'Class_Length',  u.first_name 'Instructor_First_Name', u.last_name as 'Instructor_Last_Name' FROM classes c JOIN instructor_classes ic USING (class_id) JOIN employees e USING (employee_id) JOIN users u USING (username_id);";
			
// 			//         if (! empty($_POST["search"]["value"])) {
// 			//             $sqlQuery .= 'WHERE (class_id LIKE "%' . $_POST["search"]["value"] . '%" OR class_name LIKE "%' . $_POST["search"]["value"] . '%") ';
// 			//         }
			
// 			//         if (! empty($_POST["order"])) {
// 			//             $sqlQuery .= 'ORDER BY ' . ($_POST['order']['0']['column'] + 1) . ' ' . $_POST['order']['0']['dir'] . ' ';
// 			//         } else {
// 			//             $sqlQuery .= 'ORDER BY class_name DESC ';
// 			//         }
			
// 			$stmt = $conn->prepare($sqlQuery);
// 			$stmt->execute();
			
// 			$numberRows = $stmt->rowCount();
			
// 			//         if ($_POST["length"] != - 1) {
// 			//             $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
// 			//         }
			
			
			
// 			$dataTable = array();
			
// 			while ($sqlRow = $stmt->fetch()) {
// // 			    $dataRow = array();
			    
// 			    $dataRow1 = $sqlRow['Class_Id'];
// 			    $dataRow2 = $sqlRow['Class_Name'];
// 			    $dataRow3 = $sqlRow['Limit'];
// 			    $dataRow4 = $sqlRow['Class_Length'];
// 			    $dataRow5 = $sqlRow['Instructor_First_Name'];
// 			    $dataRow6 = $sqlRow['Instructor_Last_Name'];
			    
// 			   // the join button should only appear if a member is not booked the Join button should be for members to join if they are booked in the class (need to check if they are using the members-class table)
// 			   // the leave button should only appear if a member is booked
			   
// 			    // use this website for help
// 			    // https://stackoverflow.com/questions/42478891/show-button-whose-value-is-present-in-database-else-hide-the-button#:~:text=3-,here%20is%20the%20logic,-you%20can%20try
			    
// 			    $dataRow7 = '<button type="button" name="update" emp_id="' . $sqlRow["Class_Id"] . '" class="btn btn-warning btn-sm update">Update</button>
//                           <button type="button" name="delete" emp_id="' . $sqlRow["Class_Id"] . '" class="btn btn-danger btn-sm delete" >Delete</button>';
			    
// 			    echo '<tr>
//                   <td>'.$numberRows.'</td>
//                   <td>'.$dataRow1.'</td>
//                   <td>'.$dataRow2.'</td>
//                   <td>'.$dataRow3.'</td>
//                   <td>'.$dataRow4.'</td>
//                   <td>'.$dataRow5.'</td>
//                   <td>'.$dataRow6.'</td>
//                   <td>'.$dataRow7.'</td>
//               </tr>';
// // 			    $dataTable[] = $dataRow;
// 			}
			
// // 			$output = array(
// // 			    "recordsTotal" => $numberRows,
// // 			    "recordsFiltered" => $numberRows,
// // 			    "data" => $dataTable
// // 			);

			
			
			
// 			?>
<!-- 		</table> -->
<!-- 	</div> -->
<!-- </div> -->

<!-- </body> -->
<!-- </html> -->