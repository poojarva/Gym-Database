<?php
require_once ('connection-member.php');

class Classes
{
    public function listClasses()
    {
        global $conn;
        
        $sqlQuery = "SELECT c.class_id as 'ID', c.class_name 'Class_Name',  c.limit_capacity as 'Current_Limit', c.max_limit as 'Max_Limit', c.class_length as 'Class_Length', u.first_name as 'Instructor_First_Name', u.last_name as 'Instructor_Last_Name' FROM classes c JOIN instructor_classes l USING (class_id) JOIN employees e USING (employee_id) JOIN users u USING (username_id)";
        
        if (! empty($_POST["search"]["value"])) {
            $sqlQuery .= 'WHERE (c.class_name LIKE "%' . $_POST["search"]["value"] . '%") ';
        }
        
        if (! empty($_POST["order"])) {
            $sqlQuery .= 'ORDER BY ' . ($_POST['order']['0']['column'] + 1) . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= 'ORDER BY c.class_name DESC ';
        }
        
        if ($_POST["length"] != - 1) {
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        
        
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
    
    public function listClassesBooked()
    {
        global $conn;
        
        $sqlQuery = "SELECT c.class_id as 'ID', c.class_name 'Class_Name',  c.class_length as 'Class_Length' FROM classes c JOIN classes_members USING (class_id) WHERE username_id = :username_id";
        
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->bindValue(':username_id', $_SESSION['username_id']);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['ID'];
            $dataRow[] = $sqlRow['Class_Name'];
            $dataRow[] = $sqlRow['Class_Length'];
            
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );
        
        echo json_encode($output);
    }
    
    
    public function updateClass()
    {
        global $conn;
        
        if ($_POST["ID"]) {
            $sqlQuery = "CALL addMemberToClass(:class_id, :username_id);" ;
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':class_id', $_POST["ID"]);
            $stmt->bindValue(':username_id', $_SESSION['username_id']);
            $stmt->execute();
            
            
        }
        
        
    }
    
    public function deleteClass()
    {
        global $conn;
        
        if ($_POST["ID"]) {
            $sqlQuery = "CALL removeMemberFromClass(:class_id, :username_id);" ;
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':class_id', $_POST["ID"]);
            $stmt->bindValue(':username_id', $_SESSION['username_id']);
            $stmt->execute();
            
            
            
        }
        
    }
 
}

$class = new Classes();

if(!empty($_POST['action']) && $_POST['action'] == 'listClasses') {
    $class->listClasses();
}
if(!empty($_POST['action']) && $_POST['action'] == 'listClassesBooked'){
    $class->listClassesBooked();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateClass') {
    $class->updateClass();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteClass') {
    $class->deleteClass();  
}

?>