<?php
require_once ('connection.php');

class Classes
{
    public function listClasses()
    {
        global $conn;
        
        $sqlQuery = "SELECT c.class_id as 'Class_Id', c.class_name 'Class_Name',  c.limit_capacity as 'Limit', c.class_length as 'Class_Length',  u.first_name 'Instructor_First_Name', u.last_name as 'Instructor_Last_Name' FROM classes c JOIN instructor_classes ic USING (class_id) JOIN employees e USING (employee_id) JOIN users u USING (username_id);";
        
//         if (! empty($_POST["search"]["value"])) {
//             $sqlQuery .= 'WHERE (class_id LIKE "%' . $_POST["search"]["value"] . '%" OR class_name LIKE "%' . $_POST["search"]["value"] . '%") ';
//         }
        
//         if (! empty($_POST["order"])) {
//             $sqlQuery .= 'ORDER BY ' . ($_POST['order']['0']['column'] + 1) . ' ' . $_POST['order']['0']['dir'] . ' ';
//         } else {
//             $sqlQuery .= 'ORDER BY class_name DESC ';
//         }
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
//         if ($_POST["length"] != - 1) {
//             $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
//         }
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['Class_Id'];
            $dataRow[] = $sqlRow['Class_Name'];
            $dataRow[] = $sqlRow['Limit'];
            $dataRow[] = $sqlRow['Class_Length'];
            $dataRow[] = $sqlRow['Instructor_First_Name'];
            $dataRow[] = $sqlRow['Instructor_Last_Name'];
            
            $dataRow[] = '<button type="button" name="update" emp_id="' . $sqlRow["Class_Id"] . '" class="btn btn-warning btn-sm update">Update</button>
                          <button type="button" name="delete" emp_id="' . $sqlRow["Class_Id"] . '" class="btn btn-danger btn-sm delete" >Delete</button>';
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );
        
        echo json_encode($output);
    }
 /*    
    public function getEmployee()
    {
        global $conn;
        
        if ($_POST["ID"]) {
            
            $sqlQuery = "SELECT employee_ID as `ID`,
                            first_name,
                            last_name,
                            salary,
                            manager_ID,
                            department_ID,
                            email,
                            job_ID
                     FROM employees
                     WHERE employee_ID = :employee_ID";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':employee_ID', $_POST["ID"]);
            $stmt->execute();
            
            echo json_encode($stmt->fetch());
        }
     } */
    
//     public function updateEmployee()
//     {
//         global $conn;
        
//         if ($_POST['ID']) {
            
//             $sqlQuery = "UPDATE employees
//                             SET
//                             first_name = :first_name,
//                             last_name = :last_name,
//                             manager_ID = :manager_ID,
//                             department_ID = :department_ID,
//                             email = :email,
//                             job_ID = :job_ID,
//                             salary = :salary
//                             WHERE employee_ID = :employee_ID";
            
//             $stmt = $conn->prepare($sqlQuery);
//             $stmt->bindValue(':first_name', $_POST["firstname"]);
//             $stmt->bindValue(':last_name', $_POST["lastname"]);
//             $stmt->bindValue(':manager_ID', $_POST["manager"]);
//             $stmt->bindValue(':department_ID', $_POST["department"]);
//             $stmt->bindValue(':email', $_POST["email"]);
//             $stmt->bindValue(':job_ID', $_POST["job"]);
//             $stmt->bindValue(':salary', $_POST["salary"]);
//             $stmt->bindValue(':employee_ID', $_POST["ID"]);
//             $stmt->execute();
//         }
//     }
    
//     public function addEmployee()
//     {
//         global $conn;
        
//         $sqlQuery = "INSERT INTO employees
//                      (first_name, last_name, manager_ID, department_ID, email, job_ID, salary, hire_date)
//                      VALUES
//                      (:first_name, :last_name, :manager_ID, :department_ID, :email, :job_ID, :salary, CURDATE())";
        
//         $stmt = $conn->prepare($sqlQuery);
//         $stmt->bindValue(':first_name', $_POST["firstname"]);
//         $stmt->bindValue(':last_name', $_POST["lastname"]);
//         $stmt->bindValue(':manager_ID', $_POST["manager"]);
//         $stmt->bindValue(':department_ID', $_POST["department"]);
//         $stmt->bindValue(':email', $_POST["email"]);
//         $stmt->bindValue(':job_ID', $_POST["job"]);
//         $stmt->bindValue(':salary', $_POST["salary"]);
//         $stmt->execute();
//     }
    
//     public function deleteEmployee()
//     {
//         global $conn;
        
//         if ($_POST["ID"]) {
            
//             $sqlQuery = "DELETE FROM job_history WHERE employee_ID = :employee_ID";
            
//             $stmt = $conn->prepare($sqlQuery);
//             $stmt->bindValue(':employee_ID', $_POST["ID"]);
//             $stmt->execute();
            
//             $sqlQuery = "DELETE FROM employees WHERE employee_ID = :employee_ID";
            
//             $stmt = $conn->prepare($sqlQuery);
//             $stmt->bindValue(':employee_ID', $_POST["ID"]);
//             $stmt->execute();
//         }
//     }
}

$class = new Classes();

if(!empty($_POST['action']) && $_POST['action'] == 'listClasses') {
    $class->listClasses();
}
// if(!empty($_POST['action']) && $_POST['action'] == 'addEmployee') {
//     $employee->addEmployee();
// }
// if(!empty($_POST['action']) && $_POST['action'] == 'getEmployee') {
//     $employee->getEmployee();
// }
// if(!empty($_POST['action']) && $_POST['action'] == 'updateEmployee') {
//     $employee->updateEmployee();
// }
// if(!empty($_POST['action']) && $_POST['action'] == 'deleteEmployee') {
//     $employee->deleteEmployee();
// }

?>