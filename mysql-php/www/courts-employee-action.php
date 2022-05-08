<?php
require_once ('connection-employee.php');

class Courts
{
    public function listCourts()
    {
        global $conn;
        
        $sqlQuery = "SELECT c.court_id as 'ID', c.court_type 'court_type',  c.limit_capacity as 'limit_capacity', c.max_limit as 'max_limit',  l.location_id  as 'location_id' FROM courts c JOIN location l USING (location_id)";
        
        if (! empty($_POST["search"]["value"])) {
            $sqlQuery .= 'WHERE (c.court_type LIKE "%' . $_POST["search"]["value"] . '%") ';
        }
        
        if (! empty($_POST["order"])) {
            $sqlQuery .= 'ORDER BY ' . ($_POST['order']['0']['column'] + 1) . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $sqlQuery .= 'ORDER BY c.court_type DESC ';
        }
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->execute();
        
        $numberRows = $stmt->rowCount();
        
        if ($_POST["length"] != - 1) {
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        
        
        $dataTable = array();
        
        while ($sqlRow = $stmt->fetch()) {
            $dataRow = array();
            
            $dataRow[] = $sqlRow['ID'];
            $dataRow[] = $sqlRow['court_type'];
            $dataRow[] = $sqlRow['limit_capacity'];
            $dataRow[] = $sqlRow['max_limit'];
            $dataRow[] = $sqlRow['location_id'];
            
            $dataRow[] = '<button type="button" name="update" emp_id="' . $sqlRow["ID"] . '" class="btn btn-warning btn-sm update">Update Court</button>
                          <button type="button" name="delete" emp_id="' . $sqlRow["ID"] . '" class="btn btn-danger btn-sm delete" >Delete Court</button>';
            
            $dataTable[] = $dataRow;
        }
        
        $output = array(
            "recordsTotal" => $numberRows,
            "recordsFiltered" => $numberRows,
            "data" => $dataTable
        );
        
        echo json_encode($output);
    }
    
    public function getCourt()
    {
        global $conn;
        
        if ($_POST["ID"]) {
            
            $sqlQuery = "SELECT c.court_id as 'ID', c.court_type 'room_type',  c.limit_capacity as 'limit_capacity',
 c.max_limit as 'max_limit',  l.location_id  as 'location_id' FROM courts c JOIN location l USING (location_id) WHERE court_id = :court_id";
            
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':court_id', $_POST["ID"]);
            $stmt->execute();
            
            echo json_encode($stmt->fetch());
        }
    }
    
    public function updateCourt()
    {
        global $conn;
        
        if ($_POST['ID']) {
            
            $sqlQuery = "UPDATE courts
                            SET
                            court_type = :court_type,
                            location_id = :location_id,
                            max_limit = :max_limit,
                            limit_capacity = :limit_capacity
                            WHERE court_id = :court_id";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':court_type', $_POST["court_type"]);
            $stmt->bindValue(':location_id', $_POST["location_id"]);
            $stmt->bindValue(':max_limit', $_POST["max_limit"]);
            $stmt->bindValue(':limit_capacity', $_POST["limit_capacity"]);
            $stmt->bindValue(':court_id', $_POST['ID']);
            $stmt->execute();
            
        }
    }
    
    public function addCourt()
    {
        global $conn;
        
        $sqlQuery = "CALL insertCourts(:court_type, :limit_capacity, :max_limit, :location_id);";
        
        
        $stmt = $conn->prepare($sqlQuery);
        $stmt->bindValue(':court_type', $_POST["court_type"]);
        $stmt->bindValue(':limit_capacity', $_POST["limit_capacity"]);
        $stmt->bindValue(':max_limit', $_POST["max_limit"]);
        $stmt->bindValue(':location_id', $_POST["location_id"]);
        
        $stmt->execute();
        
        
        
    }
    
    public function deleteCourt()
    {
        global $conn;
        if ($_POST["ID"]) {
            
            $sqlQuery = "DELETE FROM users_courts WHERE court_id = :court_id;";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':court_id', $_POST["ID"]);
            $stmt->execute();
            
            $sqlQuery = "DELETE FROM courts WHERE court_id = :court_id;";
            
            $stmt = $conn->prepare($sqlQuery);
            $stmt->bindValue(':court_id', $_POST["ID"]);
            $stmt->execute();
        }
    }
    
    
    
    
}

$court = new Courts();

if(!empty($_POST['action']) && $_POST['action'] == 'listCourts') {
    $court->listCourts();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getCourt') {
    $court->getCourt();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addCourt') {
    $court->addCourt();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateCourt') {
    $court->updateCourt();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteCourt') {
    $court->deleteCourt();
}


?>