<?php
require_once ('connection.php');

class Classes
{
    public function listClasses()
    {
        global $conn;
        
        $sqlQuery = "SELECT r.room_id as 'Room_Id', r.room_type 'Room_Type',  r.room_capacity as 'Room_Limit', c.class_length as 'Class_Length', l. FROM classes c JOIN location l USING (location_id);";
        
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
 
}

$class = new Classes();

if(!empty($_POST['action']) && $_POST['action'] == 'listClasses') {
    $class->listClasses();
}


?>