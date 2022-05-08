<?php
require_once ('connection-employee.php');

class Classes
{
    public function listClasses()
    {
        global $conn;
        
        $sqlQuery = "SELECT c.class_id as 'ID', c.class_name 'Class_Name',  c.limit_capacity as 'Current_Limit', c.max_limit as 'Max_Limit', c.class_length as 'Class_Length', u.first_name as 'Instructor_First_Name', u.last_name as 'Instructor_Last_Name' FROM classes c JOIN instructor_classes l USING (class_id) JOIN employees e USING (employee_id) JOIN users u USING (username_id);";
        
        if (! empty($_POST["search"]["value"])) {
            $sqlQuery .= 'WHERE (c.class_name LIKE "%' . $_POST["search"]["value"] . '%") ';
        }
        
        if (! empty($_POST["order"])) {
            $sqlQuery .= 'ORDER BY ' . ($_POST['order']['0']['column'] + 1) . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= 'ORDER BY c.class_name DESC ';
        }
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
//         if ($_POST["length"] != - 1) {
//             $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
//         }
        
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['ID'];
            $dataRow[] = $sqlRow['Class_Name'];
            $dataRow[] = $sqlRow['Current_Limit'];
            $dataRow[] = $sqlRow['Max_Limit'];
            $dataRow[] = $sqlRow['Class_Length'];
            $dataRow[] = $sqlRow['Instructor_First_Name'];
            $dataRow[] = $sqlRow['Instructor_Last_Name'];
            
            $dataRow[] = '<button type="button" name="update" emp_id="' . $sqlRow["ID"] . '" class="btn btn-warning btn-sm update">Update Class</button>
                          <button type="button" name="delete" emp_id="' . $sqlRow["ID"] . '" class="btn btn-danger btn-sm delete" >Delete Class</button>';
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );
        
        echo json_encode($output);
    }
    
    public function getClass()
    {
        global $conn;
        
        if ($_POST["ID"]) {
            
            $sqlQuery = "SELECT  c.class_id as 'class_id' , c.class_name as 'class_name', c.limit_capacity as 'limit_capacity', c.max_limit 
as 'max_limit', c.class_length as 'class_length', l.employee_id as 'employee_id', u.first_name as 'i_first_name', u.last_name as 'i_last_name' 
FROM classes c JOIN instructor_classes l USING (class_id)
 JOIN employees e USING (employee_id) JOIN users u USING (username_id); WHERE c.class_id = :class_ID";
            
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':class_ID', $_POST["ID"]);
            $stmt->execute();
            
            echo json_encode($stmt->fetch());
        }
    }
    
    public function updateClass()
    {
        global $conn;
        
        if ($_POST['ID']) {
            
            $sqlQuery = "UPDATE classes
                            SET
                            class_name = :class_name,
                            class_length = :class_length,
                            max_limit = :max_limit,
                            limit_capacity = :limit_capacity
                            WHERE class_id = :class_id";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':class_name', $_POST["class_name"]);
            $stmt->bindValue(':class_length', $_POST["class_length"]);
            $stmt->bindValue(':max_limit', $_POST["max_limit"]);
            $stmt->bindValue(':limit_capacity', $_POST["limit_capacity"]);
            $stmt->bindValue(':class_id', $_POST["class_id"]);
            $stmt->execute();
            
            $sqlQuery = "UPDATE instructor_classes
                            SET
                            employee_id = :employee_id                           
                            WHERE class_id = :class_id";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':employee_id', $_POST["employee_id"]);
            $stmt->bindValue(':class_id', $_POST["class_id"]);
            $stmt->execute();
        }
    }
    
    public function addClass()
    {
        global $conn;
        
        $sqlQuery = "INSERT INTO classes
                     (class_id, class_name, class_length, limit_capacity, max_limit)
                     VALUES
                     (:class_id, :class_name, :class_length, 'limit_capacity', :max_limit)";
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->bindValue(':class_id', $_POST["class_id"]);
        $stmt->bindValue(':class_name', $_POST["class_name"]);
        $stmt->bindValue(':class_length', $_POST["class_length"]);
        $stmt->bindValue(':limit_capacity', $_POST["max_limit"]);
        $stmt->bindValue(':max_limit', $_POST["max_limit"]);
        $stmt->execute();
        
        
        $sqlQueryAddMember = "INSERT INTO instructors_classes
                     (employee_id, class_id)
                    VALUES  
                       (:employee_id, :class_id)";
        
        $stmt = $conn->prepare($sqlQueryAddMember);
        $stmt->bindValue(':employee_id', $_POST["employee_id"]);
        $stmt->bindValue(':employee_id', $_POST["class_id"]);
        
        $stmt->execute();
        
    }
    
    public function deleteClass()
    {
        global $conn;
        if ($_POST["ID"]) {
            
            // firsrt delete from classes_members
            // then delete from instructor classes
            // then delete from classes
            $sqlQuery = "DELETE FROM classes_member WHERE class_id = :class_id";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':class_id', $_POST["ID"]);
            $stmt->execute();
            
            $sqlQuery = "DELETE FROM instructor_classes WHERE class_id = :class_id";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':class_id', $_POST["ID"]);
            $stmt->execute();
            
            $sqlQuery = "DELETE FROM classes WHERE class_id = :class_id";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':class_id', $_POST["ID"]);
            $stmt->execute();
        }
    }
    
    
    
 
}

$class = new Classes();

if(!empty($_POST['action']) && $_POST['action'] == 'listClasses') {
    $class->listClasses();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addClass') {
    $class->addClass();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getClass') {
    $class->getClass();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateClass') {
    $class->updateClass();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteClass') {
    $class->deleteClass();
}



?>